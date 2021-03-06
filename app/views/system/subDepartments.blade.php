@extends('layout')

@section('content')

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title well"><i class="fa fa-list"></i> Manage Sub-Departments</h4>
                        <hr/>
                    </div>
                </div>
                <!-- Page-Title -->


                <div class="row">

<div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="m-t-0 header-title "><b><i class="fa fa-plus"></i> Add New Sub-Department</b></h4>
                                    <hr/>

                                    <form role="form" id="registerForm_Sub">

                                        <div class="form-group">
                                            <label for="deptName">Department </label>
                                            <select class="form-control validate[required]" data-errormessage-value-missing="Status is required!" data-prompt-position="bottomRight" id="deptName" name="deptName">
                                               
                                                <option value="">--Select Department--</option>
                                                <?php $depts = Dept::all(); ?>
                                                @foreach ($depts as $d)
                                                    <option value="{{$d->id}}">{{$d->dept_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="subDeptName">Sub-Department Name: </label>
                                            <input type="text" required class="form-control validate[required]" data-errormessage-value-missing="User name is required!" data-prompt-position="bottomRight" id="subDeptName" name="subDeptName" placeholder="Enter  Name">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="subDeptStatus">Status </label>
                                            <select class="form-control validate[required]" data-errormessage-value-missing="Status is required!" data-prompt-position="bottomRight" id="subDeptStatus" name="subDeptStatus">
                                               
                                                <option value="1">Active</option>
                                                <option value="0">Blocked</option>
                                            </select>
                                        </div>
                                        
                                        
                                        <button type="button" id="deptSubSave" class="btn btn-purple waves-effect waves-light"><i class="fa fa-save"></i> SAVE</button>
                                    </form>
                                </div>

                                <div class="col-md-7">
                                    <h4 class="m-t-0 header-title"><b><i class="fa fa-list"></i> Sub Departments</b></h4>
                                    <hr/>
                                     @include('partials.files._success')
                                    <div id="bizArea">
                                    	<table id="datatable-4" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Department Name</th>
                                                    <th>Sub-Department Name</th>
                                                    <th>Status</th>
                                                    
                                                    <th>Created At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                <?php $i = 1;
                                                $depts = SubDept::orderBy('created_at', 'DESC')->get();
                                                ?>

                                                @foreach($depts as $d)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{Dept::find($d->dept_id)->dept_name}}</td>
                                                    <td>{{$d->name}}</td>
                                                    <td>{{HelperX::getStatus($d->status)}}</td>
                                                
                                                    <td>{{Carbon::parse($d->created_at)->format('Y-m-d h:i:s')}}</td>
                                                    <td>
                                                        <span style="cursor: pointer"  class="label label-primary" onclick="" url="" title="Edit This Record" rowid=""><i class="fa fa-edit"></i></span>
                                                        <span style="cursor: pointer"  class="label label-danger" onclick="" url="" title="Delete This Record" rowid=""><i class="fa fa-trash"></i></span>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                                

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



@stop