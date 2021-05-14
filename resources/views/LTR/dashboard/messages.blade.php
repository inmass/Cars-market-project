<!doctype html>
<html lang="en" dir="ltr">
	<head>
        @include('LTR/dashboard/base')
		<!-- Title -->
		<title>Messages</title>
        <style>
            .row{
                display: flex;
                align-items: baseline;
            }
            p{
                margin-bottom: 0;
                margin-left: 12px !important;
            }
        </style>
	</head>
	<body class="app sidebar-mini">

		<!--Loader-->
		<div id="global-loader">
			<img src="../assets/images/loader.svg" class="loader-img " alt="">
		</div>
		<!--/Loader-->

		<!--Page-->
		<div class="page">
			<div class="page-main">

				@include('LTR/dashboard/header')
				@include('LTR/dashboard/sidebar')


                <!--App-Content-->
                <div class="app-content">
                    <div class="side-app">
                        <div class="row mt-9">
                            <div class="col-lg-12 col-xl-12">
                                <div class="card w-100">
                                    <div class="card-body">
                                        @if (Auth::user()->messages->count())
                                        <!--MODAL-->
                                        <div id="view_message" class="modal fade">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content ">
                                                    <div class="modal-header pd-x-20">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body pd-20">
                                                        <h5 class=" lh-3 mg-b-20">Message de <span id="message_owner"></span> :</h5>
                                                        <p class="" id="message_body">test</p>
                                                        <br>
                                                        <h5 class=" lh-3 mg-b-20">Contact :</h5>
                                                        <a id="message_phone" href="">06666666666</a>
                                                        <a> | </a>
                                                        <a id="message_email" href="">email</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MODAL-->
                                        <div class="table-responsive">
                                            <table class="table card-table table-striped table-vcenter text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Messages</th>
                                                        <th>à propos de</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (Auth::user()->messages as $message)
                                                        <tr data-rowindex="{{$message->id}}" @if(!$message->seen)class="font-weight-bold"@endif>
                                                            <td>
                                                                <a style="cursor: pointer;" data-messageid="{{ $message->id }}" class="btnModal" data-toggle="modal" data-target="#view_message">
                                                                    Nouveau message de la part de <span class="text-green">{{$message->full_name}}</span> - {{$message->phone}}
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{ $message->car->marque }} {{ $message->car->modele }} (<a href="{{ route('dash_car', $message->car->uid()) }}" target="_blank">{{ $message->car->uid() }}</a>)
                                                            </td>
                                                            <td>
                                                                <a style="display: flex; align-items: center;" data-messageid="{{ $message->id }}" class="btnModal icon text-danger" data-toggle="modal" data-target="#view_message">
                                                                    <i class="fe fe-eye"></i>
                                                                    <p>Voir les détails</p>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach 
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                            <p>no messages</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/App-Content-->
			</div>

			@include('LTR/dashboard/footer')

		</div>
		<!--/Page-->

		@include('LTR/dashboard/scripts')

		<script type="text/javascript" src="../js/dash_messages.js"></script>

	</body>
</html>