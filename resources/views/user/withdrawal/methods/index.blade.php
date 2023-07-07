@extends('layouts.back')
@section('title', 'Withdrawal methods')
@section('content')

<div class="col-lg-10 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="text-end mb-3">
                <a href="{{route('user.withdrawal.methods.select')}}" class="btn btn-outline-primary btn-sm">
                    <i class="fa fa-plus"></i> Add method
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-stripped table-sm">
                    <thead>
                        <tr>
                            <th class="fs-16">Method</th>
                            <th class="fs-16">Name</th>
                            <th class="fs-16">Details</th>
                            <th class="fs-16">Default</th>
                            <th class="fs-16">Linked On</th>
                            <th class="fs-16">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($withdraw_methods as $method)
                        <tr>
                            <td class="fs-12">
                                <img src="{{asset(config('dir.methods').$method->method->image)}}" alt="" style="width:110px; height:auto;">
                            </td>
                            <td class="fs-12">
                                {{$method->name}}
                            </td>
                            <td class="fs-12"><strong>Wallet: </strong>{{Str::mask($method->address,'*',5,-5)}}</td>
                            <td class="fs-12">
                                @if($method->default)
                                <i class="fa fa-check-circle text-success light"></i>
                                @else
                                <i class="fa fa-times-circle text-danger light"></i>
                                @endif
                            </td>
                            <td class="fs-12">{{$method->created_at->format('d M, Y')}}</td>
                            <td class="fs-12">
                                <div class="dropdown dropdown-sm ms-4  mt-auto mb-auto">
                                    <div class="btn-link" data-bs-toggle="dropdown">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu">
                                        @if(!$method->default)
                                        <a class="dropdown-item fs-12" href="{{ route('user.withdrawal.methods.default',$method->id) }}">
                                            <i class="fa fa-check"></i> Make Default
                                        </a>
                                        @endif

                                        <a class="dropdown-item fs-12" href="{{ route('user.withdrawal.methods.unlink',$method->id) }}">
                                            <i class="fa fa-times"></i> Unlink
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No withdrawal methods found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .method:hover,
    .method.selected {
        border: var(--bs-teal) 1px solid;
        padding: 5px;
        border-radius: 8px;
    }
</style>
@endpush

@push('js')
<script>
    $('input[type=radio]').on('change', function(e){
        var elem = $(e.currentTarget);
        console.log(elem)
        if(elem.is(':checked')){
            $('.method.selected').removeClass('selected');
            $(elem).parents('.method').addClass('selected');
        }
    })

    $(document).on('change', '[name=method]', e => {
            var c = '.method'
            $(c).hide()
            if($(e.currentTarget).find(`option[value=${$(e.currentTarget).val()}]`).data('status') == 'inactive'){
            toast('The selected method is currently inactive','error');
            return;
            }
            if ($(e.currentTarget).val() == '') return;
            $(c).show()
    })

    $(document).on('input', '[name=amount]', e => {
            $('#amount_error').html('');
            target = $(e.currentTarget);
            value = target.val()
            fee = 5 / 100;
            if (isNaN(value)) {
                $('#amount_error').html('Amount can only be numbers');
                return;
            }

            if (value == '') {
                value = 0
            }
            total = parseFloat((fee * parseInt(value)) + parseInt(value))
            if (isNaN(total)) {
                total = 0;
            }
            $('[name=total]').val(total)
    })

    $('input[type=file]').on('change', (e) => {
            var _this = e.currentTarget
            var file = $(_this).prop('files')[0]
            var passed = false;
            ['png', 'jpeg', 'jpg'].forEach((value, index) => {
                if (file.type == 'image/' + value) {
                    passed = true;
                    return;
                }
            })

            if (!passed) {
                alert('Only png, jpg, and jpeg are allowed');
                return;
            }
            var url = URL.createObjectURL(file);
            $(_this).next('label').find('span').hide();
            $(_this).next('label').find('.preview').html(
                `<img src="${url}" class="img-responsive" style="width:100%;height:auto;"/>`
            )
    })

    $(document).on('click', '#copy', e => {
            value = $(e.currentTarget).siblings('input.copy-text').val();
            element = document.createElement('input');
            element.value = value;
            $('body').append(element);
            element.select();
            document.execCommand('copy');
            alert('Copied');
    })
</script>
@endpush
