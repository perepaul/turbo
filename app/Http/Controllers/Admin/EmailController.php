<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Email;
use Illuminate\Http\Request;
use App\Mail\SendEmailsMailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::orderBy('created_at', 'desc')->paginate();
        return view('admin.emails.index', compact('emails'));
    }

    public function sendPage(Request $request)
    {
        $users = User::where('status', '!=', 'pending')->get();
        return view('admin.emails.send', compact('users'));
    }

    public function send(Request $request)
    {
        $valid = $request->validate([
            'subject' => 'required',
            'recipients' => 'required',
            'message' => 'required',
            'attachments' => 'nullable|sometimes|required',
            'attachments.*' => 'sometimes|mimes:jpg,png,jpeg,pdf'
        ]);
        $attachData = [];
        DB::beginTransaction();
        try {
            if ($request->has('attachments')) {
                foreach ($request->attachments as $attachment) {
                    $filename = rand() . now()->toDateTimeString() . '.' . $attachment->extension();
                    $dir = public_path(config('dir.attachments'));
                    $attachment->move($dir, $filename);
                    $attachData[] = $filename;
                }
            }
            $to = User::find($request->recipients);
            foreach ($to as $user) {

                Mail::to($user)->send(new SendEmailsMailable($user, $request->message, $request->subject, $attachData));
                $mail = new Email([
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'attachments' => $attachData
                ]);
                $user->emails()->save($mail);
            }
            DB::commit();
            session()->flash('success', 'Emails sent successfully');
            return redirect()->route('admin.emails.index');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage()." File:".$th->getFile()." on Line: ". $th->getLine());
            session()->flash('error', 'Failed to send emails');
            foreach ($attachData as $data) {
                unlink(public_path(config('dir.attachments') . $data));
            }
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $email = Email::findOrFail($id);
        return view('admin.emails.read', compact('email'));
    }

    public function delete($id)
    {
        $email = Email::findOrFail($id);
        if('yes' == $email->hasAttachment())
        {
            foreach($email->attachments as $attachment)
            {
                unlink(public_path(config('dir.attachments').$attachment));
            }
        }
        $email->delete();
        session()->flash('success',"Email deleted");
        return back();
    }
}
