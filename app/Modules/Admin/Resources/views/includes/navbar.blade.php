<?php 
use Illuminate\Support\Facades\Auth;    

$user = Auth::user();
?>
<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark" >
		<div class="navbar-brand">
			<a href="#" class="d-inline-block">
				<img src="{{ asset('admin/global/images/logo_bidhee_crm.png')}}" alt="" style="height: auto;width: 170px;">
            </a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
                <li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">
				
                <li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="true">
						<i class="icon-bubbles4"></i>
						<span class="d-md-none ml-2">Messages</span>
						<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">{{$notification['count_notification']}}</span>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-header card-header bg-success d-flex">
							<span class="font-weight-semibold">Notification</span>
							
						</div>
                        <hr class="mt-0 mb-0">
						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
                                
                                @if(count($notification['list_notification']) > 0)
                                @foreach($notification['list_notification'] as $key => $notice)
                                @php
                                $icon = ($notice->is_read =='0') ? "icon-bell3" :"icon-bell-check";
                                $icon_color = ($notice->is_read =='0') ? "text-danger" :"text-success";
                                @endphp
								<li class="media @if($notice->is_read =='0') bg-light @endif">
									
									<div class="media-body">
										<div class="media-title">
											<a href="{{route('Notification.checkLink',['notification_id'=>$notice->id])}}">

												<i class="{{$icon}} {{$icon_color}} mr-1"></i><span class="text-dark">{!! $notice->message !!}</span>
												<span class="text-muted float-right font-size-sm">{{$notice->created_at->diffForHumans()}}</span>
											</a>
										</div>
                                        
									</div>
                                    <hr class="mt-2 mb-0">
								</li>
                                @endforeach
                                @else
                                <li>
                                <span>No Notification</span>
                                </li>
                                @endif
							</ul>
						</div>

						<div class="dropdown-content-footer justify-content-center p-0">
							<a href="{{route('Notification.index')}}" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="" data-original-title="See More" data-placement="bottom">
								<i class="icon-menu7 d-block top-0"></i>
							</a>
						</div>
					</div>
				</li>

				@php

				$user_type = $user->user_type;

				if($user_type != 'super_admin'){

					if($user->userEmployer->profile_pic !=''){
		           	 $imagePath = asset($user->userEmployer->file_full_path).'/'.$user->userEmployer->profile_pic;
		            }else{
		            $imagePath = asset('admin/default.png');
		            }

				}else{
				$imagePath = asset('admin/default.png');
			}

				@endphp
                
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<figure style="height: 30px; width: 30px;margin-bottom: 0px;" class="mr-2">
							<img src="{{ $imagePath }}" class="rounded-circle"  style="width: 100%; height: 100%; object-fit: cover;" alt="">
						</figure>
						<span>{{ $user->first_name }}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						@if($user_type != 'super_admin')
						<a href="{{route('employment.view.user',$user->id)}}" class="dropdown-item"><i class="icon-user-check"></i>My profile</a>
						@endif
						<a href="{{ route('change-password')}}" class="dropdown-item"><i class="icon-key"></i> Change Password</a>
						<div class="dropdown-divider"></div>
						<a href="{{ route('logout')}}" class="dropdown-item"><i class="icon-exit2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

