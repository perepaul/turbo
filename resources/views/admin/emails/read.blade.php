@extends('layouts.back')
@section('title', 'Send Email')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body d-flex justify-content-center">
                <div class="col-md-8 col-sm-12 ms-0 ms-sm-4 ms-sm-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="right-box-padding">
                                <div class="read-content">
                                    <div class="media mb-2 mt-3">
                                        <div class="media-body"><span class="pull-end">{{ $email->created_at->toTimeString() }}</span>
                                            <h5 class="my-1 text-primary">{{ $email->subject }}</h5>
                                            <p class="read-content-email">
                                                To: {{ $email->user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="read-content-body">
                                        <h5 class="mb-4">Dear {{ $email->user->name }},</h5>
                                        {!! $email->message !!}
                                        <h5 class="pt-3">Kind Regards</h5>
                                        <p>Mr Smith</p>
                                        <hr>
                                    </div>
                                    @if ('yes' == $email->hasAttachment())
                                    <div class="read-content-attachment">
                                        <h6><i class="fa fa-download mb-2"></i> Attachments
                                            <span>(3)</span>
                                        </h6>
                                        <div class="row attachment">
                                            @foreach ($email->attachments as $attachment)
                                            <div class="col-auto">
                                                <a href="{{asset(config('dir.attachments').$attachment)}}" class="text-muted" target="_blank" rel="noopener">{{$attachment}}</a>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <a href="{{route('admin.emails.index')}}" class="btn btn-primary ">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
