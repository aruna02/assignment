<!-- Main sidebar    -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md" style="background-color: #d66352;">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">


    @inject('menuRoles', '\App\Modules\User\Services\CheckUserRoles')
    @php
        $currentRoute = Request::route()->getName();
        $Route = explode('.',$currentRoute);
    @endphp

    <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">


            @if($menuRoles->assignedRoles('dashboard'))
                <!-- Main -->
                    <li class="nav-item">
                        <a href="{{url('admin/dashboard')}}" class="nav-link @if($Route[0]=='dashboard') active @endif"
                           data-popup="tooltip" data-original-title="Dashboard" data-placement="right">
                            <i class="icon-home4"></i>
                            <span>
                        Dashboard
                    </span>
                        </a>
                    </li>
            @endif

            @if($menuRoles->assignedRoles('employment.index'))
                <!-- Main -->
                    <li class="nav-item">
                        <a href="{{url('admin/employment')}}"
                           class="nav-link @if($Route[0]=='employment') active @endif" data-popup="tooltip"
                           data-original-title="Employee Management" data-placement="right">
                            <i class="icon-users"></i>
                            <span>
                    Employee Management
                </span>
                        </a>
                    </li>
            @endif


            @if($menuRoles->assignedRoles('team.index'))
                <!-- Main -->
                    <li class="nav-item">
                        <a href="{{url('admin/team')}}"
                           class="nav-link @if($Route[0]=='team') active @endif" data-popup="tooltip"
                           data-original-title="Team Management" data-placement="right">
                            <i class="icon-users"></i>
                            <span>
                Team Management
            </span>
                        </a>
                    </li>
                @endif


                {{--@if($menuRoles->assignedRoles('employment.index') OR $menuRoles->assignedRoles('department.index') OR $menuRoles->assignedRoles('designation.index'))--}}
                {{--<li class="nav-item nav-item-submenu @if(($Route[0]=='employment') OR ($Route[0]=='department')  OR ($Route[0]=='designation')) nav-item-open nav-item-expanded @endif">--}}

                {{--<a href="#" class="nav-link"><i class="icon-users"></i> <span>Employee Management</span></a>--}}

                {{--<ul class="nav nav-group-sub" data-submenu-title="Employment Level">--}}

                {{--@if($menuRoles->assignedRoles('employment.index'))--}}
                {{--<li class="nav-item"><a href="{{url('admin/employment')}}" class="nav-link @if($Route[0]=='employment') active @endif"><i class="icon-man"></i>Employee</a></li>--}}
                {{--@endif--}}
                {{--@if($menuRoles->assignedRoles('department.index'))--}}
                {{--<li class="nav-item"><a href="{{url('admin/department')}}" class="nav-link @if($Route[0]=='department') active @endif"><i class="icon-collaboration"></i>Department</a></li>--}}
                {{--@endif--}}
                {{--@if($menuRoles->assignedRoles('designation.index'))--}}
                {{--<li class="nav-item"><a href="{{url('admin/designation')}}" class="nav-link @if($Route[0]=='designation') active @endif"><i class="icon-user-tie"></i>Designation</a></li>--}}
                {{--@endif--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--@endif--}}

                @if ($menuRoles->assignedRoles('shift.index'))
                    <li class='nav-item nav-item-submenu {{ Request::is('admin/shift*') || Request::is('admin/shiftType*') ? 'nav-item-open nav-item-expanded' : '' }}'>
                        <a href="#" class="nav-link">
                            <i class="icon-shift"></i> <span>Shift Management</span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Leave Level">
                            @if($menuRoles->assignedRoles('shift.index'))
                                <li class="nav-item">
                                    <a href="{{ route('shift.index') }}"
                                       class="nav-link {{ Request::is('shift') ? 'active' : '' }}">
                                        <i class="icon-bookmark"></i>Shift
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('employee.list'))
                    <li class="nav-item">
                        <a href="{{ url('admin/employee/list') }}"
                           class="nav-link {{ Request::is('admin/employee/list') ? 'active' : '' }}"
                           data-popup="tooltip" data-original-title="Employee List" data-placement="right">
                            <i class="icon-man"></i>
                            <span>
        Employee List
    </span>
                        </a>
                    </li>
                @endif
                @if ($menuRoles->assignedRoles('attendance.index'))
                    <li class="nav-item">
                        <a href="{{ route('attendance.index') }}"
                           class="nav-link {{ Request::is('admin/attendance*') ? 'active' : '' }}" data-popup="tooltip"
                           data-original-title="Tax Calculator" data-placement="right">
                            <i class="icon-checkmark3"></i>
                            <span>Attendance Management</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('insurance.index') || $menuRoles->assignedRoles('insurancetype.index'))
                    <li class='nav-item nav-item-submenu {{ Request::is('admin/insurance*') || Request::is('admin/insurancetype') ? 'nav-item-open nav-item-expanded' : '' }}'>
                        <a href="#" class="nav-link">
                            <i class="icon-shield2"></i> <span>Insurance Management</span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Leave Level">
                            @if($menuRoles->assignedRoles('insurance.index'))
                                <li class="nav-item"><a href="{{ route('insurance.index') }}"
                                                        class="nav-link {{ Request::is('admin/insurance') ? 'active' : '' }}">
                                        <i class="icon-shield-check"></i>Insurance</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('insurancetype.index'))
                                <li class="nav-item">
                                    <a href="{{ route('insurancetype.index') }}"
                                       class="nav-link {{ Request::is('admin/insurancetype') ? 'active' : '' }}">
                                        <i class="icon-drawer"></i>Insurance Type
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                @endif

                @if($menuRoles->assignedRoles('tada.index'))
                    <li class='nav-item nav-item-submenu {{ Request::is('admin/tada*') || Request::is('admin/billType*') || Request::is('admin/allowanceType*') || Request::is('admin.tadaBill') ? 'nav-item-open nav-item-expanded' : '' }}'>
                        <a href="#" class="nav-link">
                            <i class="icon-calculator3"></i> <span>TADA management</span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Leave Level">
                            @if($menuRoles->assignedRoles('tada.index'))
                                <li class="nav-item"><a href="{{ route('tada.index') }}"
                                                        class="nav-link {{ Request::is('admin/tada') ? 'active' : '' }}">
                                        <i class="icon-airplane2"></i>Tada</a>
                                </li>
                            @endif
                            {{--  @if($menuRoles->assignedRoles('tadaBill.index'))
                            <li class="nav-item"><a href="{{ route('tadaBill.index') }}" class="nav-link {{ Request::is('admin/tadaBill') ? 'active' : '' }}">
                               <i class="icon-cash4"></i>Bill</a>
                           </li>
                           @endif --}}
                            @if($menuRoles->assignedRoles('billType.index'))
                                <li class="nav-item"><a href="{{ route('billType.index') }}"
                                                        class="nav-link {{ Request::is('admin/billType') ? 'active' : '' }}">
                                        <i class="icon-percent"></i>Bill Type</a>
                                </li>
                            @endif

                            @if($menuRoles->assignedRoles('allowanceType.index'))
                                <li class="nav-item"><a href="{{ route('allowanceType.index') }}"
                                                        class="nav-link {{ Request::is('admin/allowanceType') ? 'active' : '' }}">
                                        <i class="icon-percent"></i>Allowance Type</a>
                                </li>
                            @endif
                        </ul>
                    </li>

                @endif

                @if($menuRoles->assignedRoles('employeeRequest.index') || $menuRoles->assignedRoles('employeeRequestType.index'))
                    <li class='nav-item nav-item-submenu {{ Request::is('admin/employeeRequest*') || Request::is('admin/employeeRequestType') ? 'nav-item-open nav-item-expanded' : '' }}'>
                        <a href="#" class="nav-link">
                            <i class="icon-bubble-lines4"></i> <span>Request Management</span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Leave Level">
                            @if($menuRoles->assignedRoles('employeeRequest.index'))
                                <li class="nav-item"><a href="{{ route('employeeRequest.index') }}"
                                                        class="nav-link {{ Request::is('admin/employeeRequest') ? 'active' : '' }}">
                                        <i class="icon-bubbles9"></i>Request</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('employeeRequestType.index'))
                                <li class="nav-item">
                                    <a href="{{ route('employeeRequestType.index') }}"
                                       class="nav-link {{ Request::is('admin/employeeRequestType') ? 'active' : '' }}">
                                        <i class="icon-drawer"></i>Request Type
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('instantmessaging.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/instantmessaging')}}"
                           class="nav-link @if($Route[0]=='instantmessaging') active @endif" data-popup="tooltip"
                           data-original-title="Instant Messaging" data-placement="right">
                            <i class="icon-envelop4"></i>
                            <span>
        Instant Messaging
    </span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('leave.index') OR $menuRoles->assignedRoles('leaveType.index'))
                    <li class='nav-item nav-item-submenu @if(($Route[0]=="leave") OR ($Route[0]=="leaveType")) nav-item-open nav-item-expanded @endif'>
                        <a href="#" class="nav-link"><i class="icon-exit3"></i> <span>Leave Management</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Leave Level">
                            @if($menuRoles->assignedRoles('leave.index'))
                                <li class="nav-item"><a href="{{url('admin/leave')}}"
                                                        class="nav-link @if($Route[0]=='leave') active @endif">
                                        <i class="icon-clipboard3"></i>Leave</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('leaveType.index'))
                                <li class="nav-item"><a href="{{ url('admin/leaveType')}}"
                                                        class="nav-link @if($Route[0]=='leaveType') active @endif"><i
                                                class="icon-drawer"></i>Leave Type</a></li>
                            @endif
                        </ul>
                    </li>
                @endif



                @if($menuRoles->assignedRoles('dailyClient.index') OR $menuRoles->assignedRoles('activeLead.index') OR $menuRoles->assignedRoles('convertedLead.index') OR $menuRoles->assignedRoles('rejectedLead.index'))
                    <li class='nav-item nav-item-submenu @if(($Route[0]=="dailyClient") OR ($Route[0]=="activeLead") OR ($Route[0]=="convertedLead") OR ($Route[0]=="rejectedLead")) nav-item-open nav-item-expanded @endif'>
                        <a href="#" class="nav-link"><i class="icon-users4"></i> <span>Lead Management</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Lead Level">
                            @if($menuRoles->assignedRoles('dailyClient.index'))
                                <li class="nav-item"><a href="{{url('admin/dailyClient')}}"
                                                        class="nav-link  @if($Route[0]=='dailyClient') active @endif">
                                        <i class="icon-tree7"></i>Daily Client Approach</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('activeLead.index'))
                                <li class="nav-item"><a href="{{ url('admin/activeLead')}}"
                                                        class="nav-link @if($Route[0]=='activeLead') active @endif"><i
                                                class="icon-user-check"></i>Active Leads</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('convertedLead.index'))
                                <li class="nav-item"><a href="{{ url('admin/convertedLead')}}"
                                                        class="nav-link @if($Route[0]=='convertedLead') active @endif"><i
                                                class="icon-thumbs-up3"></i>Converted Leads</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('rejectedLead.index'))
                                <li class="nav-item"><a href="{{ url('admin/rejectedLead')}}"
                                                        class="nav-link @if($Route[0]=='rejectedLead') active @endif"><i
                                                class="icon-thumbs-down3"></i>Rejected Leads</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('holiday.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/holiday')}}" class="nav-link @if($Route[0]=='holiday') active @endif"
                           data-popup="tooltip" data-original-title="Holiday Details" data-placement="right">
                            <i class="icon-airplane3"></i>
                            <span>
                                Holiday Details
                            </span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('advance.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/advance')}}" class="nav-link @if($Route[0]=='advance') active @endif"
                           data-popup="tooltip" data-original-title=" Advance Management" data-placement="right">
                            <i class="icon-coins"></i>
                            <span>
                            Advance Management
                        </span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('appraisalType.index') OR $menuRoles->assignedRoles('appraisalScore.index') OR $menuRoles->assignedRoles('appraisalQuestion.index')  OR $menuRoles->assignedRoles('appraisalCreation.index') )
                    <li class="nav-item nav-item-submenu {{ $Route[0]=='appraisalType' || $Route[0]=='appraisalScore' || $Route[0]=='appraisalQuestion' || $Route[0]=='appraisalCreation' ? 'nav-item-open nav-item-expanded' : ''  }}">
                        <a href="#" class="nav-link"><i class="icon-users4"></i> <span>Appraisal Management</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Lead Level">
                            @if($menuRoles->assignedRoles('appraisalType.index'))
                                <li class="nav-item"><a href="{{route('appraisalType.index')}}"
                                                        class="nav-link  @if($Route[0]=='appraisalType') active @endif">
                                        <i class="icon-tree7"></i>Appraisal Type</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('appraisalScore.index'))
                                <li class="nav-item"><a href="{{ route('appraisalScore.index')}}"
                                                        class="nav-link @if($Route[0]=='appraisalScore') active @endif"><i
                                                class="icon-user-check"></i>Appraisal Score</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('appraisalQuestion.index'))
                                <li class="nav-item"><a href="{{ route('appraisalQuestion.index')}}"
                                                        class="nav-link @if($Route[0]=='appraisalQuestion') active @endif"><i
                                                class="icon-thumbs-up3"></i>Appraisal Question</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('appraisalCreation.index'))
                                <li class="nav-item"><a href="{{ route('appraisalCreation.index')}}"
                                                        class="nav-link @if($Route[0]=='appraisalCreation') active @endif"><i
                                                class="icon-thumbs-up3"></i>Appraisal Creation</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('reminder.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/reminder')}}" class="nav-link @if($Route[0]=='reminder') active @endif"
                           data-popup="tooltip" data-original-title="Reminder Management" data-placement="right">
                            <i class="icon-file-text"></i>
                            <span>
                                        Reminder Management
                                    </span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('document.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/document')}}" class="nav-link @if($Route[0]=='document') active @endif"
                           data-popup="tooltip" data-original-title="Document Management" data-placement="right">
                            <i class="icon-stack2"></i>
                            <span>
                                    Document Management
                                </span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('notice.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/notice')}}" class="nav-link @if($Route[0]=='notice') active @endif"
                           data-popup="tooltip" data-original-title="Notice Management" data-placement="right">
                            <i class="icon-megaphone"></i>
                            <span>
                                Notice Management
                            </span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('milestone.index') OR $menuRoles->assignedRoles('goal.index'))
                    <li class='nav-item nav-item-submenu @if(($Route[0]=="milestone") OR ($Route[0]=="goal")) nav-item-open nav-item-expanded @endif'>
                        <a href="#" class="nav-link"><i class="icon-shield-check"></i> <span>Goal/Milestone</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Milestone Level">
                            @if($menuRoles->assignedRoles('milestone.index'))
                                <li class="nav-item"><a href="{{url('admin/milestone')}}"
                                                        class="nav-link @if($Route[0]=='milestone') active @endif">
                                        <i class="icon-flag4"></i>Milestone</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('goal.index'))
                                <li class="nav-item"><a href="{{ url('admin/goal')}}"
                                                        class="nav-link @if($Route[0]=='goal') active @endif"><i
                                                class="icon-target"></i>Goal</a></li>
                            @endif
                        </ul>
                    </li>
                @endif


                @if($menuRoles->assignedRoles('project.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/project')}}" class="nav-link @if($Route[0]=='project') active @endif"
                           data-popup="tooltip" data-original-title="Project Management" data-placement="right">
                            <i class="icon-stack-check"></i>
                            <span>
                                    Project Management
                                </span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('opulencecamp.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/opulencecamp')}}"
                           class="nav-link @if($Route[0]=='opulencecamp') active @endif" data-popup="tooltip"
                           data-original-title="OpulenceCamp Management" data-placement="right">
                            <i class="icon-stats-growth"></i>
                            <span>
                                OpulenceCamp Project Mgmt. Tool
                            </span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('dailywork.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/dailywork')}}" class="nav-link @if($Route[0]=='dailywork') active @endif"
                           data-popup="tooltip" data-original-title="Daily Work Activities" data-placement="right">
                            <i class="icon-chart"></i>
                            <span>
                            Daily Work Activities
                        </span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('dropdown.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/dropdown')}}" class="nav-link @if($Route[0]=='dropdown') active @endif"
                           data-popup="tooltip" data-original-title="DropDown Management" data-placement="right">
                            <i class="icon-move-vertical"></i>
                            <span>
                        DropDown Management
                    </span>
                        </a>
                    </li>
                @endif


                @if($menuRoles->assignedRoles('role.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/role')}}" class="nav-link @if($Route[0]=='role') active @endif"
                           data-popup="tooltip" data-original-title="Role Management" data-placement="right">
                            <i class="icon-pencil5"></i>
                            <span>
                    Role Management
                </span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('appreciate.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/appreciate')}}"
                           class="nav-link @if($Route[0]=='appreciate') active @endif" data-popup="tooltip"
                           data-original-title="Appreciate Management" data-placement="right">
                            <i class="icon-pencil5"></i>
                            <span>
                Appreciate Management
            </span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('boardingtask.index') OR $menuRoles->assignedRoles('boardingquestion.index'))
                    <li class="nav-item nav-item-submenu @if(($Route[0]=='boardingtask') OR ($Route[0]=='boardingquestion') ) nav-item-open nav-item-expanded @endif">

                        <a href="#" class="nav-link"><i class="icon-upload"></i> <span>Boarding Management</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Boarding Level">

                            @if($menuRoles->assignedRoles('boardingtask.index'))
                                <li class="nav-item"><a href="{{url('admin/boarding-task')}}"
                                                        class="nav-link @if($Route[0]=='boardingtask') active @endif"><i
                                                class="icon-cog5"></i>Boarding Task</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('boardingquestion.index'))
                                <li class="nav-item"><a href="{{url('admin/boarding-question')}}"
                                                        class="nav-link @if($Route[0]=='boardingquestion') active @endif"><i
                                                class="icon-question7"></i>Boarding Question</a></li>
                            @endif
                        </ul>
                    </li>
                @endif


                @if($menuRoles->assignedRoles('training.index') OR $menuRoles->assignedRoles('trainee.index'))
                    <li class="nav-item nav-item-submenu @if(($Route[0]=='training') OR ($Route[0]=='trainee') ) nav-item-open nav-item-expanded @endif">

                        <a href="#" class="nav-link"><i class="icon-upload"></i> <span>Training Management</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Boarding Level">

                            @if($menuRoles->assignedRoles('training.index'))
                                <li class="nav-item"><a href="{{url('admin/training')}}"
                                                        class="nav-link @if($Route[0]=='training') active @endif"><i
                                                class="icon-cog5"></i>Training</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('trainee.index'))
                                <li class="nav-item"><a href="{{url('admin/trainee')}}"
                                                        class="nav-link @if($Route[0]=='trainee') active @endif"><i
                                                class="icon-question7"></i>Trainee</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('openposition.index') OR $menuRoles->assignedRoles('applicant.index'))
                    <li class="nav-item nav-item-submenu @if(($Route[0]=='openposition') OR ($Route[0]=='applicant') ) nav-item-open nav-item-expanded @endif">

                        <a href="#" class="nav-link"><i class="icon-upload"></i> <span>Hiring Management</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Boarding Level">

                            @if($menuRoles->assignedRoles('openposition.index'))
                                <li class="nav-item"><a href="{{url('admin/open-position')}}"
                                                        class="nav-link @if($Route[0]=='openposition') active @endif"><i
                                                class="icon-cog5"></i>Open Position</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('applicant.index'))
                                <li class="nav-item"><a href="{{url('admin/applicant')}}"
                                                        class="nav-link @if($Route[0]=='applicant') active @endif"><i
                                                class="icon-question7"></i>Applicant</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('salary.index'))
                    <li class="nav-item">
                        <a href="{{url('admin/salary')}}" class="nav-link @if($Route[0]=='salary') active @endif"
                           data-popup="tooltip" data-original-title="Salary Management" data-placement="right">
                            <i class="icon-coins"></i>
                            <span>
                                    Salary Management
                                </span>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="http://www.salarytaxnepal.com/" class="nav-link" data-popup="tooltip"
                       data-original-title="Tax Calculator" data-placement="right" target="_blank">
                        <i class="icon-calculator"></i>
                        <span>Tax Calculator</span>
                    </a>
                </li>

                @if($menuRoles->assignedRoles('questionnaire.index') || $menuRoles->assignedRoles('question.index') || $menuRoles->assignedRoles('questionEvent.index'))
                    <li class="nav-item nav-item-submenu @if($Route[0]=='questionType') nav-item-open nav-item-expanded @endif">
                        <a href="#" class="nav-link"><i class="icon-upload"></i> <span>Online Examination and Quiz Management</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Examination Level">
                            @if(Auth::user()->user_type=='super_admin' && $menuRoles->assignedRoles('questionnaire.index'))
                                <li class="nav-item"><a href="{{route('questionnaire.index')}}"
                                                        class="nav-link  @if($Route[0]=='questionnaire') active @endif">
                                        <i class="icon-question7"></i>Category</a></li>
                            @endif
                            @if(Auth::user()->user_type=='super_admin' && $menuRoles->assignedRoles('question.index'))
                                <li class="nav-item"><a href="{{route('question.index')}}"
                                                        class="nav-link  @if($Route[0]=='question') active @endif">
                                        <i class="icon-question3"></i>Question By Category</a></li>
                            @endif
                            @if(Auth::user()->user_type=='super_admin' && $menuRoles->assignedRoles('questionEvent.index'))
                                <li class="nav-item"><a href="{{route('questionEvent.index')}}"
                                                        class="nav-link  @if($Route[0]=='questionEvent') active @endif">
                                        <i class="icon-question4"></i>Question Event</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('questionEvent.stats'))
                                <li class="nav-item"><a href="{{route('questionEvent.stats')}}"
                                                        class="nav-link  @if($Route[0]=='questionEvent') active @endif">
                                        <i class="icon-question4"></i>Question Event Statistics</a></li>
                            @endif
                            @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('userAnswer.index'))
                                <li class="nav-item"><a href="{{route('userAnswer.index')}}"
                                                        class="nav-link  @if($Route[0]=='userAnswer') active @endif">
                                        <i class="icon-tree7"></i>Exams</a></li>
                            @endif
                            @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('userScore.stats'))
                                <li class="nav-item"><a href="{{route('userScore.stats')}}"
                                                        class="nav-link  @if($Route[0]=='quizexam') active @endif">
                                        <i class="icon-question4"></i>Exam Statistics</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('surveyCategory.index') || $menuRoles->assignedRoles('surveyQuestion.index') || $menuRoles->assignedRoles('surveyEvent.index') || $menuRoles->assignedRoles('surveyAnswer.index') || $menuRoles->assignedRoles('surveyEvent.stats'))
                    <li class="nav-item nav-item-submenu @if($Route[0]=='questionType') nav-item-open nav-item-expanded @endif">
                        <a href="#" class="nav-link"><i class="icon-upload"></i> <span>Online Survey and Feedback Management</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Survey Level">
                            @if($menuRoles->assignedRoles('surveyCategory.index'))
                                <li class="nav-item"><a href="{{route('surveyCategory.index')}}"
                                                        class="nav-link  @if($Route[0]=='surveyCategory') active @endif">
                                        <i class="icon-question7"></i>Category</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('surveyQuestion.index'))
                                <li class="nav-item"><a href="{{route('surveyQuestion.index')}}"
                                                        class="nav-link  @if($Route[0]=='surveyQuestion') active @endif">
                                        <i class="icon-question7"></i>Question</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('surveyEvent.index'))
                                <li class="nav-item"><a href="{{route('surveyEvent.index')}}"
                                                        class="nav-link  @if($Route[0]=='surveyEvent') active @endif">
                                        <i class="icon-question7"></i>Survey Event</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('surveyEvent.stats'))
                                <li class="nav-item"><a href="{{route('surveyEvent.stats')}}"
                                                        class="nav-link  @if($Route[0]=='surveyEvent') active @endif">
                                        <i class="icon-question7"></i>Survey Statistics</a></li>
                            @endif
                            @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('surveyAnswer.index'))
                                <li class="nav-item"><a href="{{route('surveyAnswer.index')}}"
                                                        class="nav-link  @if($Route[0]=='surveyAnswer') active @endif">
                                        <i class="icon-question7"></i>Survey Event</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('grievanceType.index') || $menuRoles->assignedRoles('grievance.index') || $menuRoles->assignedRoles('grievanceCreator.index') || $menuRoles->assignedRoles('grievance.stats') || $menuRoles->assignedRoles('grievanceSolver.index'))
                        <li class="nav-item nav-item-submenu @if($Route[0]=='grievanceType') nav-item-open nav-item-expanded @endif">
                            <a href="#" class="nav-link"><i class="icon-file-text"></i> <span>Grievance Management</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Grievance Level">
                                @if($menuRoles->assignedRoles('grievanceType.index'))
                                    <li class="nav-item"><a href="{{route('grievanceType.index')}}" class="nav-link  @if($Route[0]=='grievanceType') active @endif">
                                    <i class="icon-question7"></i>Grievance Type</a></li>
                                @endif
                                @if($menuRoles->assignedRoles('grievance.index'))
                                    <li class="nav-item"><a href="{{route('grievance.index')}}" class="nav-link  @if($Route[0]=='grievance') active @endif">
                                    <i class="icon-file-text"></i>Grievance List</a></li>
                                @endif
                                @if($menuRoles->assignedRoles('grievanceSolver.index'))
                                    <li class="nav-item"><a href="{{route('grievanceSolver.index')}}" class="nav-link  @if($Route[0]=='grievanceSolver') active @endif">
                                    <i class="icon-file-text"></i>Assigned Grievance List</a></li>
                                @endif
                                @if($menuRoles->assignedRoles('grievance.stats'))
                                    <li class="nav-item"><a href="{{route('grievance.stats')}}" class="nav-link  @if($Route[0]=='grievance') active @endif">
                                    <i class="icon-statistics"></i>Grievance Statistics</a></li>
                                @endif
                                @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('grievanceCreator.index'))
                                    <li class="nav-item"><a href="{{route('grievanceCreator.index')}}" class="nav-link  @if($Route[0]=='grievanceCreator') active @endif">
                                    <i class="icon-file-text"></i>Grievance List</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                @if($menuRoles->assignedRoles('grievanceType.index') || $menuRoles->assignedRoles('grievance.index') || $menuRoles->assignedRoles('grievanceCreator.index') || $menuRoles->assignedRoles('grievance.stats') || $menuRoles->assignedRoles('grievanceSolver.index'))
                    <li class="nav-item nav-item-submenu @if($Route[0]=='grievanceType') nav-item-open nav-item-expanded @endif">
                        <a href="#" class="nav-link"><i class="icon-file-text"></i>
                            <span>Grievance Management</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Examination Level">
                            @if($menuRoles->assignedRoles('grievanceType.index'))
                                <li class="nav-item"><a href="{{route('grievanceType.index')}}"
                                                        class="nav-link  @if($Route[0]=='grievanceType') active @endif">
                                        <i class="icon-question7"></i>Grievance Type</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('grievance.index'))
                                <li class="nav-item"><a href="{{route('grievance.index')}}"
                                                        class="nav-link  @if($Route[0]=='grievance') active @endif">
                                        <i class="icon-file-text"></i>Grievance List</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('grievanceSolver.index'))
                                <li class="nav-item"><a href="{{route('grievanceSolver.index')}}"
                                                        class="nav-link  @if($Route[0]=='grievanceSolver') active @endif">
                                        <i class="icon-file-text"></i>Assigned Grievance List</a></li>
                            @endif
                            @if($menuRoles->assignedRoles('grievance.stats'))
                                <li class="nav-item"><a href="{{route('grievance.stats')}}"
                                                        class="nav-link  @if($Route[0]=='grievance') active @endif">
                                        <i class="icon-statistics"></i>Grievance Statistics</a></li>
                            @endif
                            @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('grievanceCreator.index'))
                                <li class="nav-item"><a href="{{route('grievanceCreator.index')}}"
                                                        class="nav-link  @if($Route[0]=='grievanceCreator') active @endif">
                                        <i class="icon-file-text"></i>Grievance List</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('roster.index'))
                    <li class="nav-item nav-item-submenu @if($Route[0]=='rosterClient') nav-item-open nav-item-expanded @endif">
                        <a href="#" class="nav-link"><i class="icon-file-text"></i></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Roster Level">
                            <li class="nav-item"><a href="{{route('rosterClient.index')}}" class="nav-link  @if($Route[0]=='rosterClient') active @endif"><i class="icon-users4"></i>Clients</a></li>       
                            <li class="nav-item"><a href="{{route('staff.index')}}" class="nav-link  @if($Route[0]=='staff') active @endif"><i class="icon-users"></i>Staffs</a></li>        
                            <li class="nav-item"><a href="{{route('rosterSetting.index')}}" class="nav-link  @if($Route[0]=='rosterSetting') active @endif"><i class="icon-cog3"></i>Roster Settings</a></li>                                
                            <li class="nav-item"><a href="{{route('roster.index')}}" class="nav-link  @if($Route[0]=='roster') active @endif"><i class="icon-user-check"></i>Roster</a></li>                                
                        </ul>
                    </li>
                @endif

                <li class='nav-item nav-item-submenu'>
                    <a href="#" class="nav-link"><i class="icon-exit3"></i> <span>Account Management</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Leave Level">
                        @if($menuRoles->assignedRoles('client.index'))
                            <li class="nav-item"><a href="{{url('admin/client')}}"
                                                    class="nav-link @if($Route[0]=='client') active @endif"> <i
                                            class="icon-clipboard3"></i>Clients</a></li>
                            <li class="nav-item"><a href="{{url('admin/account')}}"
                                                    class="nav-link @if($Route[0]=='leaveType') active @endif"><i
                                            class="icon-drawer"></i>Account</a></li>
                            <li class="nav-item"><a href="{{url('admin/deposit')}}" class="nav-link"><i
                                            class="icon-drawer"></i>Deposit</a></li>
                            <li class="nav-item"><a href="{{url('admin/expenses')}}" class="nav-link"><i
                                            class="icon-drawer"></i>Expenses</a></li>
                            <li class="nav-item"><a href="{{url('admin/transfer')}}" class="nav-link"><i
                                            class="icon-drawer"></i>Transfer</a></li>
                            <li class="nav-item"><a href="{{url('admin/bill')}}" class="nav-link"><i
                                            class="icon-drawer"></i>Bills</a></li>
                            <li class="nav-item"><a href="{{url('admin/asset')}}" class="nav-link"><i
                                            class="icon-drawer"></i>Assets</a></li>
                            <li class="nav-item"><a href="" class="nav-link "><i class="icon-drawer"></i>View
                                    Transaction</a></li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="icon-drawer"></i>Account Balance</a>
                            </li>
                        @endif
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
