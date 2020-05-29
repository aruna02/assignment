<!-- Secondary navbar -->
@inject('menuRoles', '\App\Modules\User\Services\CheckUserRoles')
@php
    $currentRoute = Request::route()->getName();
    $Route = explode('.',$currentRoute);
@endphp
<div class="navbar navbar-expand-md navbar-dark border-top-0">
    <div class="d-md-none w-100">
        <button type="button" class="navbar-toggler d-flex align-items-center w-100" data-toggle="collapse"
                data-target="#navbar-navigation">
            <i class="icon-menu-open mr-2"></i>
            Main navigation
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-navigation">
        <ul class="navbar-nav navbar-nav-highlight">
            @if($menuRoles->assignedRoles('dashboard'))
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="navbar-nav-link @if($Route[0]=='dashboard') active @endif">
                        <i class="icon-home4 mr-2"></i>
                        Dashboard
                    </a>
                </li>
            @endif

            <li class="nav-item nav-item-levels mega-menu-full">
                <a href="#"
                   class="navbar-nav-link dropdown-toggle"
                   data-toggle="dropdown">
                    <i class="icon-make-group mr-2"></i>
                    Navigation
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">Main
                                </div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        @if($menuRoles->assignedRoles('employment.index'))

                                            <li>
                                                <a href="{{route('employment.index')}}"
                                                   class="dropdown-item rounded @if($Route[0]=='employment') active @endif">
                                                    <i class="icon-users"></i>
                                                    Employment Management
                                                </a>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('leave.index') OR $menuRoles->assignedRoles('leaveType.index'))
                                            <li>
                                                <a href="#" class="dropdown-item rounded"><i class="icon-copy"></i>
                                                    Leave
                                                    Management</a>
                                                <ul class="list-unstyled">
                                                    @if($menuRoles->assignedRoles('leave.index'))
                                                        <li><a href="{{route('leave.index')}}"
                                                               class="dropdown-item rounded @if($Route[0]=='leave') active @endif"><i
                                                                        class="icon-clipboard3"></i>Leave</a></li>
                                                    @endif
                                                    @if($menuRoles->assignedRoles('leaveType.index'))
                                                        <li><a href="{{route('leaveType.index')}}"
                                                               class="dropdown-item rounded @if($Route[0]=='leaveType') active @endif"><i
                                                                        class="icon-drawer"></i>Leave Type</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('dailyClient.index') OR $menuRoles->assignedRoles('activeLead.index') OR $menuRoles->assignedRoles('convertedLead.index') OR $menuRoles->assignedRoles('rejectedLead.index'))
                                            <li>
                                                <a href="#" class="dropdown-item rounded"><i
                                                            class="icon-color-sampler"></i>
                                                    Lead Management</a>
                                                <ul class="list-unstyled">
                                                    @if($menuRoles->assignedRoles('dailyClient.index'))
                                                        <li><a href="{{route('dailyClient.index')}}"
                                                               class="dropdown-item @if($Route[0]=='dailyClient') active @endif  rounded"><i
                                                                        class="icon-tree7"></i>Daily
                                                                Client</a></li>
                                                    @endif
                                                    @if($menuRoles->assignedRoles('activeLead.index'))
                                                        <li><a href="{{route('activeLead.index')}}"
                                                               class="dropdown-item @if($Route[0]=='activeLead') active @endif rounded"><i
                                                                        class="icon-user-check"></i>Active
                                                                Lead</a></li>
                                                    @endif
                                                    @if($menuRoles->assignedRoles('convertedLead.index'))
                                                        <li><a href="{{route('convertedLead.index')}}"
                                                               class="dropdown-item @if($Route[0]=='convertedLead') active @endif  rounded"><i
                                                                        class="icon-thumbs-up3"></i>Converted
                                                                Lead</a></li>
                                                    @endif
                                                    @if($menuRoles->assignedRoles('rejectedLead.index'))
                                                        <li><a href="{{route('rejectedLead.index')}}"
                                                               class="dropdown-item @if($Route[0]=='rejectedLead') active @endif  rounded"><i
                                                                        class="icon-thumbs-down3"></i>Rejected
                                                                Lead</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('employee.list'))
                                            <li>
                                                <a href="{{route('employee.list')}}"
                                                   class="dropdown-item {{ Request::is('admin/employee/list') ? 'active' : '' }} rounded">
                                                    <i class="icon-man"></i>
                                                    Employee List
                                                </a>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('team.index'))
                                            <li>
                                                <a href="{{route('team.index')}}"
                                                   class="dropdown-item @if($Route[0]=='team') active @endif rounded">
                                                    <i class="icon-users4"></i>
                                                    Team Management
                                                </a>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                    HR Process
                                </div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        @if ($menuRoles->assignedRoles('attendance.index'))
                                            <li>
                                                <a href="{{ route('attendance.index') }}"
                                                   class="dropdown-item {{ Request::is('admin/attendance*') ? 'active' : '' }} rounded">
                                                    <i class="icon-checkmark3"></i>
                                                    Attendance Management
                                                </a>
                                            </li>
                                        @endif
                                        @if ($menuRoles->assignedRoles('shift.index'))
                                            <li>
                                                <a href="{{ route('shift.index') }}"
                                                   class="dropdown-item {{ Request::is('shift') ? 'active' : '' }} rounded">
                                                    <i class="icon-bookmark"></i>
                                                    Shift Management
                                                </a>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('holiday.index'))
                                            <li>
                                                <a href="{{route('holiday.index')}}"
                                                   class="dropdown-item  @if($Route[0]=='holiday') active @endif rounded">
                                                    <i class="icon-airplane3"></i>
                                                    Holiday Management
                                                </a>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('document.index'))
                                            <li>
                                                <a href="{{route('document.index')}}"
                                                   class="dropdown-item @if($Route[0]=='document') active @endif rounded">
                                                    <i class="icon-stack2"></i>
                                                    Document Management
                                                </a>
                                            </li>
                                        @endif

                                        @if($menuRoles->assignedRoles('role.index'))
                                            <li>
                                                <a href="{{route('role.index')}}"
                                                   class="dropdown-item @if($Route[0]=='role') active @endif rounded">
                                                    <i class="icon-pencil5"></i>
                                                    Role Management
                                                </a>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                    Requisition
                                </div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        @if($menuRoles->assignedRoles('training.index') OR $menuRoles->assignedRoles('trainee.index'))
                                            <li>
                                                <a href="#" class="dropdown-item rounded"><i
                                                            class="icon-color-sampler"></i>
                                                    Training Management</a>
                                                <ul class="list-unstyled">
                                                    @if($menuRoles->assignedRoles('training.index'))
                                                        <li><a href="{{route('training.index')}}"
                                                               class="dropdown-item @if($Route[0]=='training') active @endif rounded"><i
                                                                        class="icon-cog5"></i>Training
                                                                Setup</a></li>
                                                    @endif
                                                    @if($menuRoles->assignedRoles('trainee.index'))
                                                        <li><a href="{{route('trainee.index')}}"
                                                               class="dropdown-item @if($Route[0]=='trainee') active @endif rounded"><i
                                                                        class="icon-question7"></i>Trainnee</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('employeeRequest.index') || $menuRoles->assignedRoles('employeeRequestType.index'))
                                            <li>
                                                <a href="#" class="dropdown-item rounded"><i
                                                            class="icon-color-sampler"></i>
                                                    Request Management</a>
                                                <ul class="list-unstyled">
                                                    @if($menuRoles->assignedRoles('employeeRequest.index'))
                                                        <li><a href="{{route('employeeRequest.index')}}"
                                                               class="dropdown-item {{ Request::is('admin/employeeRequest') ? 'active' : '' }} rounded">
                                                                <i class="icon-bubbles9"></i>Request</a>
                                                        </li>
                                                    @endif
                                                    @if($menuRoles->assignedRoles('employeeRequestType.index'))
                                                        <li><a href="{{route('employeeRequestType.index')}}"
                                                               class="dropdown-item {{ Request::is('admin/employeeRequestType') ? 'active' : '' }} rounded">
                                                                <i class="icon-drawer"></i>Request
                                                                Type</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('tada.index'))
                                            <li>
                                                <a href="#" class="dropdown-item rounded"><i
                                                            class="icon-color-sampler"></i>
                                                    TADA Management</a>
                                                <ul class="list-unstyled">
                                                    @if($menuRoles->assignedRoles('tada.index'))
                                                        <li><a href="{{route('tada.index')}}"
                                                               class="dropdown-item {{ Request::is('admin/tada') ? 'active' : '' }} rounded">
                                                                <i
                                                                        class="icon-airplane2"></i>Tada Setup </a></li>
                                                    @endif
                                                    @if($menuRoles->assignedRoles('billType.index'))
                                                        <li><a href="{{route('billType.index')}}"
                                                               class="dropdown-item {{ Request::is('admin/billType') ? 'active' : '' }} rounded">
                                                                <i class="icon-percent"></i>Bill
                                                                Type </a></li>
                                                    @endif
                                                    @if($menuRoles->assignedRoles('allowanceType.index'))
                                                        <li><a href="{{route('allowanceType.index')}}"
                                                               class="dropdown-item {{ Request::is('admin/allowanceType') ? 'active' : '' }} rounded">
                                                                <i class="icon-percent"></i>Allowance
                                                                Type </a></li>
                                                    @endif

                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                    Extras
                                </div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        @if($menuRoles->assignedRoles('instantmessaging.index'))
                                            <li>
                                                <a href="{{route('instantmessaging.index')}}"
                                                   class="dropdown-item @if($Route[0]=='instantmessaging') active @endif rounded">
                                                    <i class="icon-envelop4"></i>
                                                    Instant Messaging
                                                </a>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('notice.index'))
                                            <li>
                                                <a href="{{route('notice.index')}}"
                                                   class="dropdown-item @if($Route[0]=='notice') active @endif rounded">
                                                    <i class="icon-megaphone"></i>
                                                    Notice Management
                                                </a>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('reminder.index'))
                                            <li>
                                                <a href="{{route('reminder.index')}}"
                                                   class="dropdown-item @if($Route[0]=='reminder') active @endif rounded">
                                                    <i class="icon-file-text"></i>
                                                    Reminder Management
                                                </a>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('appreciate.index'))
                                            <li>
                                                <a href="{{route('appreciate.index')}}"
                                                   class="dropdown-item @if($Route[0]=='appreciate') active @endif rounded">
                                                    <i class="icon-pencil5"></i>
                                                    Appreciate Management
                                                </a>
                                            </li>
                                        @endif
                                        @if($menuRoles->assignedRoles('dailywork.index'))
                                            <li>
                                                <a href="{{route('dailywork.index')}}" class="dropdown-item rounded">
                                                    <i class="icon-chart"></i>
                                                    Daily Work Activities
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item mega-menu-full">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">HR Process</a>

                <div class="dropdown-menu dropdown-content w-xl-90">
                    <div class="dropdown-content-body">
                        <div class="row">
                            <div class="col-xl-3">
                                @if($menuRoles->assignedRoles('boardingtask.index') OR $menuRoles->assignedRoles('boardingquestion.index'))
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Boarding Management
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if($menuRoles->assignedRoles('boardingtask.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('boardingtask.index')}}" class="dropdown-item rounded"><i
                                                        class="icon-cog5"></i>Boarding
                                                Task</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('boardingquestion.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('boardingquestion.index')}}"
                                               class="dropdown-item @if($Route[0]=='boardingquestion') active @endif rounded"><i
                                                        class="icon-question7"></i>Boarding
                                                Question</a>
                                        </div>
                                    @endif
                                @endif
                                @if($menuRoles->assignedRoles('openposition.index') OR $menuRoles->assignedRoles('applicant.index'))
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Hiring
                                        Process
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if($menuRoles->assignedRoles('openposition.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('openposition.index')}}"
                                               class="dropdown-item @if($Route[0]=='openposition') active @endif rounded"><i
                                                        class="icon-cog5"></i>Open
                                                Position</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('applicant.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('applicant.index')}}"
                                               class="dropdown-item @if($Route[0]=='applicant') active @endif rounded"><i
                                                        class="icon-question7"></i>Applicant</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            @if($menuRoles->assignedRoles('appraisalType.index') OR $menuRoles->assignedRoles('appraisalScore.index') OR $menuRoles->assignedRoles('appraisalQuestion.index')  OR $menuRoles->assignedRoles('appraisalCreation.index') )
                                <div class="col-xl-3">
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Appraisal Management
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if($menuRoles->assignedRoles('appraisalType.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('appraisalType.index')}}"
                                               class="dropdown-item @if($Route[0]=='appraisalType') active @endif rounded"><i
                                                        class="icon-clipboard3"></i>Appraisal Type
                                                Setup</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('appraisalScore.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('appraisalScore.index')}}"
                                               class="dropdown-item @if($Route[0]=='appraisalScore') active @endif rounded"><i
                                                        class="icon-medal-star"></i>Appraisal Score Setup</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('appraisalQuestion.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('appraisalQuestion.index')}}"
                                               class="dropdown-item @if($Route[0]=='appraisalQuestion') active @endif rounded"><i
                                                        class="icon-question7"></i> Appraisal Question Setup</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('appraisalCreation.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('appraisalCreation.index')}}"
                                               class="dropdown-item @if($Route[0]=='appraisalCreation') active @endif rounded"><i
                                                        class="icon-pen-plus"></i>Appraisal Setup</a>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if($menuRoles->assignedRoles('questionnaire.index') || $menuRoles->assignedRoles('question.index') || $menuRoles->assignedRoles('questionEvent.index'))
                                <div class="col-xl-3">
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Online
                                        Exam And Quiz Management
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if(Auth::user()->user_type=='super_admin' && $menuRoles->assignedRoles('questionnaire.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('questionnaire.index')}}"
                                               class="dropdown-item @if($Route[0]=='questionnaire') active @endif rounded"><i
                                                        class="icon-list2"></i>Category Setup</a>
                                        </div>
                                    @endif
                                    @if(Auth::user()->user_type=='super_admin' && $menuRoles->assignedRoles('question.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('question.index')}}"
                                               class="dropdown-item @if($Route[0]=='question') active @endif rounded"><i
                                                        class="icon-question3"></i>Question By Category Setup</a>
                                        </div>
                                    @endif
                                    @if(Auth::user()->user_type=='super_admin' && $menuRoles->assignedRoles('questionEvent.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('questionEvent.index')}}"
                                               class="dropdown-item @if($Route[0]=='questionEvent') active @endif rounded"><i
                                                        class="icon-list3"></i>Question Event</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('questionEvent.stats'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('questionEvent.stats')}}"
                                               class="dropdown-item @if($Route[0]=='questionEvent') active @endif rounded"><i
                                                        class="icon-statistics"></i>Question Event Statistics</a>
                                        </div>
                                    @endif
                                    @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('userAnswer.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('userAnswer.index')}}"
                                               class="dropdown-item @if($Route[0]=='userAnswer') active @endif rounded"><i
                                                        class="icon-statistics"></i>Exams</a>
                                        </div>
                                    @endif
                                    @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('userScore.stats'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('userScore.stats')}}"
                                               class="dropdown-item @if($Route[0]=='quizexam') active @endif rounded"><i
                                                        class="icon-statistics"></i>Exam Statistics</a>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if($menuRoles->assignedRoles('grievanceType.index') || $menuRoles->assignedRoles('grievance.index') || $menuRoles->assignedRoles('grievanceCreator.index') || $menuRoles->assignedRoles('grievance.stats') || $menuRoles->assignedRoles('grievanceSolver.index'))
                                <div class="col-xl-3">
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Grievance Management
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if($menuRoles->assignedRoles('grievanceType.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('grievanceType.index')}}" class="dropdown-item rounded"><i
                                                        class="icon-question7"></i>Grievance Type Setup</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('grievance.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('grievance.index')}}" class="dropdown-item rounded"><i
                                                        class="icon-file-text"></i>List Grievance</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('grievanceSolver.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('grievanceSolver.index')}}"
                                               class="dropdown-item rounded"><i
                                                        class="icon-file-text"></i>List Assigned Grievance</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('grievance.stats'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('grievance.stats')}}" class="dropdown-item rounded"><i
                                                        class="icon-statistics"></i>Grievance Statistics</a>
                                        </div>
                                    @endif
                                    @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('grievanceCreator.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('grievanceCreator.index')}}"
                                               class="dropdown-item @if($Route[0]=='grievanceCreator') active @endif rounded"><i
                                                        class="icon-statistics"></i>Grievance List</a>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item mega-menu-full">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">Extra</a>

                <div class="dropdown-menu dropdown-content w-xl-90">
                    <div class="dropdown-content-body">
                        <div class="row">
                            @if($menuRoles->assignedRoles('surveyCategory.index') || $menuRoles->assignedRoles('surveyQuestion.index') || $menuRoles->assignedRoles('surveyEvent.index') || $menuRoles->assignedRoles('surveyAnswer.index') || $menuRoles->assignedRoles('surveyEvent.stats'))
                                <div class="col-xl-3">
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Online Survey And Feedback
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if($menuRoles->assignedRoles('surveyCategory.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('surveyCategory.index')}}" class="dropdown-item rounded"><i
                                                        class="icon-question7"></i>Category Setup</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('surveyQuestion.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('surveyQuestion.index')}}" class="dropdown-item rounded"><i
                                                        class="icon-question7"></i>Question Setup</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('surveyEvent.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('surveyEvent.index')}}" class="dropdown-item rounded"><i
                                                        class="icon-cogs"></i>Survey Event Setup</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('surveyEvent.stats'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('surveyEvent.stats')}}" class="dropdown-item rounded"><i
                                                        class="icon-pulse2"></i>Survey Statistics</a>
                                        </div>
                                    @endif
                                    @if(Auth::user()->user_type!='super_admin' && $menuRoles->assignedRoles('surveyAnswer.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('surveyAnswer.index')}}"
                                               class="dropdown-item @if($Route[0]=='surveyAnswer') active @endif rounded"><i
                                                        class="icon-pulse2"></i>Survey Statistics</a>
                                        </div>
                                    @endif

                                </div>
                            @endif
                            <div class="col-xl-3">
                                @if($menuRoles->assignedRoles('milestone.index') OR $menuRoles->assignedRoles('goal.index'))
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Goal/Milestone
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if($menuRoles->assignedRoles('milestone.index'))

                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('milestone.index')}}"
                                               class="dropdown-item @if($Route[0]=='milestone') active @endif rounded"><i
                                                        class="icon-flag4"></i>MileStone</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('goal.index') OR $menuRoles->assignedRoles('opulencecamp.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('goal.index')}}"
                                               class="dropdown-item @if($Route[0]=='goal') active @endif rounded"><i
                                                        class="icon-target"></i>Goal</a>
                                        </div>
                                    @endif
                                @endif
                                @if($menuRoles->assignedRoles('project.index'))
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Project
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if($menuRoles->assignedRoles('project.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('project.index')}}" class="dropdown-item @if($Route[0]=='project') active @endif rounded"><i
                                                        class="icon-stack-check"></i> Project Management</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('opulencecamp.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{route('opulencecamp.index')}}" class="dropdown-item @if($Route[0]=='opulencecamp') active @endif rounded"><i
                                                        class="icon-stats-growth"></i>OpulenceCamp Management</a>
                                        </div>
                                    @endif
                                @endif


                            </div>
                            @if($menuRoles->assignedRoles('insurance.index') || $menuRoles->assignedRoles('insurancetype.index'))
                                <div class="col-xl-3">
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Insurance Management
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    @if($menuRoles->assignedRoles('insurance.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('insurancetype.index') }}" class="dropdown-item {{ Request::is('admin/insurance') ? 'active' : '' }} rounded"><i
                                                        class="icon-shield-check"></i>Insurance Type Setup</a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('insurancetype.index'))
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('insurance.index') }}" class="dropdown-item {{ Request::is('admin/insurancetype') ? 'active' : '' }} rounded"><i
                                                        class="icon-drawer"></i>Insurance </a>
                                        </div>
                                    @endif
                                    @if($menuRoles->assignedRoles('roster.index'))
                                        <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                            
                                        </div>
                                        <div class="dropdown-divider mb-2"></div>
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('rosterClient.index') }}" class="dropdown-item @if($Route[0]=='rosterClient') active @endif rounded"><i
                                                        class="icon-users"></i>Insurance </a>
                                        </div>
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('staff.index') }}" class="dropdown-item @if($Route[0]=='staff') active @endif rounded"><i
                                                        class="icon-users4"></i>Clients </a>
                                        </div>
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('rosterSetting.index') }}" class="dropdown-item @if($Route[0]=='rosterSetting') active @endif rounded"><i
                                                        class="icon-cog3"></i>Roster Settings </a>
                                        </div>
                                        <div class="mb-3 mb-xl-0">
                                            <a href="{{ route('roster.index') }}" class="dropdown-item @if($Route[0]=='roster') active @endif rounded"><i
                                                        class="icon-user-check"></i>Roster </a>
                                        </div>
                                    @endif


                                </div>
                            @endif

                            @if($menuRoles->assignedRoles('salary.index'))
                                <div class="col-xl-3">
                                    <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1 text-teal text-center">
                                        Payroll
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    <div class="mb-3 mb-xl-0">
                                        <a href="{{url('admin/salary')}}" class="dropdown-item @if($Route[0]=='salary') active @endif rounded"><i
                                                    class="icon-stats-growth"></i>Salary Management</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </li>


        </ul>
    </div>
</div>
<!-- /secondary navbar -->