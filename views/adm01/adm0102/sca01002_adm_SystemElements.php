<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">System Elements</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">System Elements</li>
                        </ol>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Roles Master</h4>
                            </div>

                            <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#rolesmastertab" role="tab"><b>Roles Master</b></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#rolesaccesstab" role="tab"><b>Roles Access</b></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#processtab" role="tab"><b>Processes & Functons</b></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#databasetab" role="tab"><b>Datebase Tables</b></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#screenstab" role="tab"><b>Screens</b></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#businesstab" role="tab"><b>Business Controls</b></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#notificationstab" role="tab"><b>Notifications Master</b></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="rolesmastertab" role="tabpanel">
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table class="table color-bordered-table info-bordered-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Role ID</th>
                                                            <th>Role Title</th>
                                                            <th>Role Admin</th>
                                                            <th>Service</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if(isset($roles)) {
                                                                foreach ($roles as $role) {
                                                        ?>
                                                        <tr>
                                                            <td><?=$role->RoleID?></td>
                                                            <td><?=$role->RoleTitle?></td>
                                                            <td><?=$role->RoleAdmin?> </td>
                                                            <td><?=$role->ServiceTitle?></td>
                                                            <td><button type="button" class="btn waves-effect waves-light btn-danger"  onclick="edit_rolesmaster('<?=$role->RoleID?>');"  >Edit Role</button> <button type="button" class="btn waves-effect waves-light btn-inverse" onclick="delete_rolesmaster('<?=$role->RoleID?>');"   >Delete</button>
                                                            </td>
                                                        </tr>
                                                        <?php }} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- col-md-6-->
                                        <div class="col-md-6">
                                            <p><button class="btn btn-success" type="button" data-toggle="collapse" data-target="#rolesmaster" aria-expanded="false" aria-controls="rolesmaster">
                                                Add New Role
                                            </button></p>

                                            <?php if($togglesetting == 1) { ?>
                                            <div class="collapse show" id="rolesmaster">
                                            <?php } else { ?>
                                            <div class="collapse" id="rolesmaster">
                                            <?php } ?>
                                                <div class="card card-body">
                                                    <form class="form-horizontal form-material" id="rolesmasterform" method="post">
                                                        <div class="form-group has-danger">
                                                            <label class="col-md-12">Role ID</label>
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="default_roleid" id="default_roleid" value="<?=set_value('default_roleid',0)?>"  class="form-control form-control-line">
                                                                <input type="text" name="roleid" id="roleid"  value="<?=set_value('roleid')?>" placeholder="" class="form-control form-control-line">
                                                                <small class="form-control-feedback"><?php echo form_error('roleid'); ?></small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-danger">
                                                            <label for="roletitle" class="col-md-12">Role Title</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="" value="<?=set_value('roletitle')?>"  class="form-control form-control-line" name="roletitle" id="roletitle">
                                                                <small class="form-control-feedback"><?php echo form_error('roletitle'); ?></small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-danger">
                                                            <label class="col-md-12">Role Admin</label>
                                                            <div class="col-md-12">
                                                                <?php 
                                                                    $array = array();
                                                                    $array['No'] = "No";
                                                                    $array['Yes'] = "Yes";
                                                                    echo form_dropdown("roleadmin", $array, set_value("roleadmin"), "id='roleadmin' class='form-control  form-control-line roleadmin'");
                                                                ?>
                                                                <small class="form-control-feedback"><?php echo form_error('roleadmin'); ?></small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-danger">
                                                            <label class="col-md-12">Select Service</label>
                                                            <div class="col-md-12">
                                                                <?php 
                                                                    $array = array();
                                                                    $array[''] = "Select Service";
                                                                    if(isset($services)) {
                                                                    foreach ($services as $service) {
                                                                        $array[$service->ServiceID] = $service->ServiceTitle;
                                                                    }}
                                                                    echo form_dropdown("roleservice", $array, set_value("roleservice"), "id='roleservice' class='form-control  form-control-line roleservice'");
                                                                ?>
                                                                <small class="form-control-feedback"><?php echo form_error('roleservice'); ?></small>
                                                            </div>
                                                        </div>                                                        
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <button type="submit" name="rolemaster" class="btn btn-success rolebtn">Save</button>
                                                                <button type="button" class="btn btn-inverse closerolemaster">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- col-md-6 -->

                                        
                                    </div>
                                </div>
                                <!--roles access tab-->
                                <div class="tab-pane" id="rolesaccesstab" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="table-responsive">
                                                    <table class="table color-bordered-table info-bordered-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Role</th>
                                                                <th>Element Type</th>
                                                                <th>Element Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if(isset($roleaccess)) {
                                                                    foreach ($roleaccess as $roleacc) {
                                                            ?>
                                                            <tr>
                                                                <td><?=$roleacc->RoleTitle?></td>
                                                                <td><?php if($roleacc->RoleAccessElementType == 'F') { echo "Functions"; } else { echo "Screens"; } ?> </td>
                                                                <td><?=$roleacc->RoleAccessElement?></td>
                                                                <td><button type="button" class="btn waves-effect waves-light btn-danger"  onclick="editRoleAccess('<?=$roleacc->RoleAccessID?>');"  >Edit Access</button> <button type="button" class="btn waves-effect waves-light btn-inverse" onclick="deleteRoleAccess('<?=$roleacc->RoleAccessID?>');"   >Delete</button>
                                                                </td>
                                                            </tr>
                                                            <?php }} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- col-md-6-->
                                            <div class="col-md-6">
                                                <p><button class="btn btn-success" type="button" data-toggle="collapse" data-target="#rolesaccess" aria-expanded="false" aria-controls="rolesaccess">
                                                    Add Role Access
                                                </button></p>

                                                <div class="collapse" id="rolesaccess">
                                                    <div class="card card-body">
                                                        <form class="form-horizontal form-material" method="post" id="rolesaccessform">
                                                            <div class="form-group">
                                                                <label class="col-md-12">Select Role</label>
                                                                <input type="hidden" placeholder="" class="form-control form-control-line" name="roleaccessid" id="roleaccessid" value="0">
                                                                <div class="col-md-12">
                                                                    <?php 
                                                                        $array = array();
                                                                        $array[''] = "Select Roles";
                                                                        if(isset($roles)) {
                                                                        foreach ($roles as $role) {
                                                                            $array[$role->RoleID] = $role->RoleTitle;
                                                                        }}
                                                                        echo form_dropdown("roleaccesstitle", $array, set_value("roleaccesstitle"), "id='roleaccesstitle' class='form-control  form-control-line roleaccesstitle'");
                                                                    ?>
                                                                    <small class="form-control-feedback"><?php echo form_error('roleaccesstitle'); ?></small>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Element Type</label>
                                                                <div class="col-md-12">
                                                                    <?php 
                                                                        $array = array();
                                                                        $array[''] = "Select Type";
                                                                        $array['F'] = "Function";
                                                                        $array['S'] = "Screen";
                                                                        echo form_dropdown("elementtype", $array, set_value("elementtype"), "id='elementtype' class='form-control  form-control-line elementtype'");
                                                                    ?>
                                                                    <small class="form-control-feedback"><?php echo form_error('elementtype'); ?></small>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Select Element</label>
                                                                <div class="col-md-12">
                                                                    <?php 
                                                                        $array = array();
                                                                        $array[''] = "Select Element";
                                                                        echo form_dropdown("element", $array, set_value("element"), "id='element' class='form-control  form-control-line element'");
                                                                    ?>
                                                                    <small class="form-control-feedback"><?php echo form_error('element'); ?></small>
                                                                </div>
                                                            </div>                                                        
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" name="roleaccess"  class="btn btn-success roleaccessbtn">Save</button>
                                                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- col-md-6 -->
                                            
                                        </div>                                        
                                    </div>
                                </div>
                                <!-- Processes and Functions -->
                                <div class="tab-pane" id="processtab" role="tabpanel">
                                    <div class="card-body">
                                        <button type="button" class="btn waves-effect waves-light btn-success m-t-5" data-toggle="modal" data-target="#processesandfunctions-modal">Add New Functions</button><br><br>
                                        <div class=" table-responsive">
                                            <table id="functionsTable" class="table striped editable-table  color-bordered-table info-bordered-table">
                                                <thead>
                                                    <tr>
                                                        <th>Function ID</th>
                                                        <th>Description</th>
                                                        <th>Access</th>
                                                        <th>Component</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if(isset($functions)) {
                                                        foreach ($functions as $func) {
                                                    ?>
                                                    <tr>
                                                        <td value="def_functionid" class="hide"><?=$func->FunctionID?></td>
                                                        <td value="functionid"><?=$func->FunctionID?></td>
                                                        <td value="functiondesc"><?=$func->FunctionDescription?> </td>
                                                        <td value="functionaccess"><?php if($func->FunctionAccess=='A'){ echo "Admin"; } else if($func->FunctionAccess=='U'){ echo 'User'; }elseif($func->FunctionAccess=='S'){ echo 'System'; }else { echo ''; } ?></td>
                                                        <td value="functioncomponent"><?=$func->FunctionComponent?></td>
                                                        <td value="btn"><button type="button" class="btn waves-effect waves-light btn-danger updateFunctions" >Update</button> <button type="button" class="btn waves-effect waves-light btn-inverse" onclick="deleteFunctions('<?=$func->FunctionID?>');"   >Delete</button></td>
                                                    </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Database Tables Tab -->
                                <div class="tab-pane" id="databasetab" role="tabpanel">
                                    <div class="card-body">
                                        <button type="button" class="btn waves-effect waves-light btn-success m-t-5" data-toggle="modal" data-target="#dbtables-modal">Add New Tables</button><br><br>
                                        <div class=" table-responsive">
                                            <table id="dbtablesTable" class="table striped editable-table  color-bordered-table info-bordered-table">
                                                <thead>
                                                    <tr>
                                                        <th>Table ID</th>
                                                        <th>Description</th>
                                                        <th>Access</th>
                                                        <th>Component</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if(isset($dbtables)) {
                                                        foreach ($dbtables as $tables) {
                                                    ?>
                                                    <tr>
                                                    <td value="def_tableid" class="hide"><?=$tables->TableID?></td>
                                                        <td value="tableid"><?=$tables->TableID?></td>
                                                        <td value="tabledesc"><?=$tables->TableDescription?> </td>
                                                        <td value="tableaccess"><?php if($tables->TableAccess=='A'){ echo "Admin"; } else if($tables->TableAccess=='U'){ echo 'User'; }elseif($tables->TableAccess=='S'){ echo 'System'; }else { echo ''; } ?></td>
                                                        <td value="tablecomponent"><?=$tables->TableComponent?></td>
                                                        <td value="btn"><button type="button" class="btn waves-effect waves-light btn-danger updateTables" >Update</button> <button type="button" class="btn waves-effect waves-light btn-inverse" onclick="deleteDBTables('<?=$tables->TableID?>');"   >Delete</button>
                                                        </td>
                                                    </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Screens -->
                                <div class="tab-pane" id="screenstab" role="tabpanel">
                                    <div class="card-body">
                                        <button type="button" class="btn waves-effect waves-light btn-success m-t-5" data-toggle="modal" data-target="#screens-modal">Add New Screens</button><br><br>
                                        <div class=" table-responsive">
                                            <table id="screensTable" class="table striped editable-table  color-bordered-table info-bordered-table">
                                                <thead>
                                                    <tr>
                                                        <th>Screen ID</th>
                                                        <th>Description</th>
                                                        <th>Access</th>
                                                        <th>Component</th>
                                                        <th>Location</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if(isset($screens)) {
                                                        foreach ($screens as $scrns) {
                                                    ?>
                                                    <tr>
                                                        <td value="def_screenid" class="hide"><?=$scrns->ScreenID?></td>
                                                        <td value="screenid"><?=$scrns->ScreenID?></td>
                                                        <td value="screendesc"><?=$scrns->ScreenDescription; ?></td>
                                                        <td value="screenaccess"><?php if($scrns->ScreenAccess=='A'){ echo "Admin"; } else if($scrns->ScreenAccess=='U'){ echo 'User'; }elseif($scrns->ScreenAccess=='S'){ echo 'System'; }else { echo ''; } ?></td>
                                                        <td value="screencomponent"><?=$scrns->ScreenComponent?></td>
                                                        <td value="screenlocation"><?=$scrns->ScreenLocation?></td>
                                                        <td value="btn"><button type="button" class="btn waves-effect waves-light btn-danger updateScreens" >Update</button> <button type="button" class="btn waves-effect waves-light btn-inverse" onclick="deleteScreens('<?=$scrns->ScreenID?>');"   >Delete</button>
                                                        </td>
                                                    </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="businesstab" role="tabpanel">
                                    <div class="card-body">
                                        <h1>businesstab</h1>
                                    </div>
                                </div>

                                <div class="tab-pane" id="notificationstab" role="tabpanel">
                                    <div class="card-body">
                                        <h1>notificationstab</h1>
                                    </div>
                                </div>

                                </div>
                            </div>
                            </div>  
                        </div>
                    </div>
                    
                </div>
                <!-- Row -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->    


                <!-- rolesmaster modal content -->
                <!-- <div id="rolesmaster-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Roles Master</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="rolesmasterform" role="form" method="post">
                                    <div class="form-group roleidgrp">
                                        <label for="roleid" class="control-label">Role Id:</label>
                                        <input type="text" class="form-control" name="roleid" id="roleid">
                                        <small class="form-control-feedback"><div class="roleiderror"></div></small>
                                    </div>
                                    <div class="form-group roletitlegrp">
                                        <label for="roletitle" class="control-label">Role Title:</label>
                                        <input type="text" class="form-control" name="roletitle" id="roletitle">
                                        <small class="form-control-feedback"><div class="roletitleerror"></div></small>
                                    </div>
                                    <div class="form-group roleadmingrp">
                                        <label for="roleadmin" class="control-label">Role Admin:</label>
                                        <select class="form-control" name="roleadmin" id="roleadmin">
                                            <option value='No'>No</option>
                                            <option value='Yes'>Yes</option>
                                        </select>
                                        <small class="form-control-feedback"><div class="roleadminerror"></div></small>
                                    </div>
                                    <div class="form-group roleservicegrp">
                                            <label for="roleservice" class="control-label">Select Service:</label>
                                            <?php 
                                                $array = array();
                                                $array[''] = "Select Service";
                                                if(isset($services)) {
                                                foreach ($services as $service) {
                                                    $array[$service->ServiceID] = $service->ServiceTitle;
                                                }}
                                                echo form_dropdown("roleservice", $array, set_value("roleservice"), "id='roleservice' class='form-control custom-select roleservice'");
                                            ?>
                                            <small class="form-control-feedback"><div class="roleserviceerror"></div></small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_rolesmaster();" class="btn btn-danger waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /.rolesmaster modal -->

                <!-- rolesaccess modal content -->
                <!-- <div id="rolesaccess-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Role Access</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="roleaccessform" role="form" method="post">
                                    <div class="form-group roleaccessservicegrp">
                                            <label for="roleaccessservice" class="control-label">Select Service:</label>
                                            <?php 
                                                $array = array();
                                                $array[''] = "Select Service";
                                                if(isset($services)) {
                                                foreach ($services as $service) {
                                                    $array[$service->ServiceID] = $service->ServiceTitle;
                                                }}
                                                echo form_dropdown("roleaccessservice", $array, set_value("roleaccessservice"), "id='roleaccessservice' class='form-control custom-select roleaccessservice'");
                                            ?>
                                            <small class="form-control-feedback"><div class="roleaccessserviceerror"></div></small>
                                    </div>
                                    <div class="form-group roleaccesselementtypegrp">
                                        <label for="roleaccesselementtype" class="control-label">Element Type:</label>
                                        <select class="form-control" name="roleaccesselementtype" id="roleaccesselementtype">
                                            <option value=''>Select Type</option>
                                            <option value='F'>Function</option>
                                            <option value='S'>Screen</option>
                                        </select>
                                        <small class="form-control-feedback"><div class="roleaccesselementtypeerror"></div></small>
                                    </div>
                                    <div class="form-group roleaccesselementidgrp">
                                        <label for="roleaccesselementid" class="control-label">Element:</label>
                                        <?php 
                                                $array = array();
                                                $array[''] = "Select Element";
                                                if(isset($services)) {
                                                foreach ($services as $service) {
                                                   // $array[$service->ServiceID] = $service->ServiceTitle;
                                                }}
                                                echo form_dropdown("roleaccesselementid", $array, set_value("roleaccessservice"), "id='roleaccesselementid' class='form-control custom-select roleaccesselementid'");
                                            ?>
                                        <small class="form-control-feedback"><div class="roleaccesselementiderror"></div></small>
                                    </div>
                                    
                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_rolesmaster();" class="btn btn-danger waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /.rolesaccess modal -->

                <!-- processesandfunctions modal content -->
                <div id="processesandfunctions-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Processes and Functions</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="processesandfunctionsform" role="form" method="post">
                                    <div class="form-group functionidgrp">
                                        <label for="functionid" class="control-label">Function ID:</label>
                                        <input type="hidden" class="form-control" name="def_functionid" id="def_functionid" value="0">
                                        <input type="text" class="form-control form-control-line" name="functionid" id="functionid">
                                        <small class="form-control-feedback"><div class="functioniderror"></div></small>
                                    </div>
                                    <div class="form-group functiondescgrp">
                                        <label for="functiondesc" class="control-label">Function Description:</label>
                                        <input type="text" class="form-control form-control-line" name="functiondesc" id="functiondesc">
                                        <small class="form-control-feedback"><div class="functiondescerror"></div></small>
                                    </div>
                                    <div class="form-group functionaccessgrp">
                                        <label for="functionaccess" class="control-label">Element Type:</label>
                                        <select class="form-control form-control-line" name="functionaccess" id="functionaccess">
                                            <option value="A">Admin</option>
                                            <option value="U">User</option>
                                            <option value="S">System</option>
                                        </select>
                                        <small class="form-control-feedback"><div class="functionaccesserror"></div></small>
                                    </div>
                                    <div class="form-group functioncomponentgrp">
                                       <label for="functioncomponent" class="control-label">Function Component:</label>
                                        <input type="text" class="form-control form-control-line" name="functioncomponent" id="functioncomponent">
                                        <small class="form-control-feedback"><div class="functioncomponenterror"></div></small>
                                    </div>
                                    
                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_functions();" class="btn btn-danger waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.processesandfunctions modal -->

                <!-- dbtables modal content -->
                <div id="dbtables-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Database Tables</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="dbtablesform" role="form" method="post">
                                    <div class="form-group tableidgrp">
                                        <label for="tableid" class="control-label">Table ID:</label>
                                        <input type="hidden" class="form-control" name="def_tableid" id="def_tableid" value="0">
                                        <input type="text" class="form-control form-control-line" name="tableid" id="tableid">
                                        <small class="form-control-feedback"><div class="tableiderror"></div></small>
                                    </div>
                                    <div class="form-group tabledescgrp">
                                        <label for="tabledesc" class="control-label">Table Description:</label>
                                        <input type="text" class="form-control form-control-line" name="tabledesc" id="tabledesc">
                                        <small class="form-control-feedback"><div class="tabledescerror"></div></small>
                                    </div>
                                    <div class="form-group tableaccessgrp">
                                        <label for="tableaccess" class="control-label">Table Type:</label>
                                        <select class="form-control form-control-line" name="tableaccess" id="tableaccess">
                                            <option value="A">Admin</option>
                                            <option value="U">User</option>
                                            <option value="S">System</option>
                                        </select>
                                        <small class="form-control-feedback"><div class="tableaccesserror"></div></small>
                                    </div>
                                    <div class="form-group tablecomponentgrp">
                                       <label for="tablecomponent" class="control-label">Table Component:</label>
                                        <input type="text" class="form-control form-control-line" name="tablecomponent" id="tablecomponent">
                                        <small class="form-control-feedback"><div class="tablecomponenterror"></div></small>
                                    </div>
                                    
                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_tables();" class="btn btn-danger waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.dbtables modal -->

                <!-- screens modal content -->
                <div id="screens-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Screens Tables</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="screensform" role="form" method="post">
                                    <div class="form-group screenidgrp">
                                        <label for="screenid" class="control-label">Screen ID:</label>
                                        <input type="hidden" class="form-control" name="def_screenid" id="def_screenid" value="0">
                                        <input type="text" class="form-control form-control-line" name="screenid" id="screenid">
                                        <small class="form-control-feedback"><div class="screeniderror"></div></small>
                                    </div>
                                    <div class="form-group screendescgrp">
                                        <label for="screendesc" class="control-label">Screen Description:</label>
                                        <input type="text" class="form-control form-control-line" name="screendesc" id="screendesc">
                                        <small class="form-control-feedback"><div class="screendescerror"></div></small>
                                    </div>
                                    <div class="form-group screenaccessgrp">
                                        <label for="screenaccess" class="control-label">Screen Type:</label>
                                        <select class="form-control form-control-line" name="screenaccess" id="screenaccess">
                                            <option value="A">Admin</option>
                                            <option value="U">User</option>
                                            <option value="S">System</option>
                                        </select>
                                        <small class="form-control-feedback"><div class="screenaccesserror"></div></small>
                                    </div>
                                    <div class="form-group screencomponentgrp">
                                       <label for="screencomponent" class="control-label">Screen Component:</label>
                                        <input type="text" class="form-control form-control-line" name="screencomponent" id="screencomponent">
                                        <small class="form-control-feedback"><div class="screencomponenterror"></div></small>
                                    </div>
                                    <div class="form-group screenlocationgrp">
                                       <label for="screenlocation" class="control-label">Screen Location:</label>
                                        <input type="text" class="form-control form-control-line" name="screenlocation" id="screenlocation">
                                        <small class="form-control-feedback"><div class="screenlocationerror"></div></small>
                                    </div>
                                    
                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_screens();" class="btn btn-danger waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.screens modal -->

                                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->



<script src="<?=base_url('assets/js/custom/jquery_2_1_1_jquery.min.js')?>"></script>

<script type='text/javascript'>   
function add_rolesmaster()
{
    var roleid=$('#roleid').val();
    var roletitle=$('#roletitle').val();
    var roleadmin=$('#roleadmin').val();
    var roleservice=$('#roleservice').val();

    if(roleid == '') { $('.roleidgrp').addClass( "has-danger" );  
        $('.roleiderror').html("The Role ID is required"); } 
    else { $('.roleidgrp').removeClass( "has-danger" ); $('.roleiderror').html("");  }
    if(roletitle == '') { $('.roletitlegrp').addClass( "has-danger" );  
        $('.roletitleerror').html("The Role Title is required"); } 
    else { $('.roletitlegrp').removeClass( "has-danger" ); $('.roletitleerror').html("");  }
    if(roleadmin == '') { $('.roleadmingrp').addClass( "has-danger" ); $('.roleadminerror').html("The Role Admin is required");  } 
    else { $('.roleadmingrp').removeClass( "has-danger" ); $('.roleadminerror').html("");  }
    if(roleservice == '') { $('.roleservicegrp').addClass( "has-danger" ); $('.roleserviceerror').html("The Role Service is required"); } 
    else { $('.roleservicegrp').removeClass( "has-danger" ); $('.roleserviceerror').html(""); }

    console.log(roleid+' '+roletitle+' '+roleadmin+' '+roleservice);

    if(roleid != '' && roletitle != '' && roleadmin != '' && roleservice != '')
    {
    $(document).ready(function(){
        var dataString = $("#rolesmasterform").serialize();
        console.log(dataString);
        var url="adm01/adm0102/Cnt_sca01002_System_Structure/RoleMaster"
        $.ajax({
        type:"POST",
        url:"<?php echo base_url() ?>"+url,
        data:dataString,
        success:function (data) {
            console.log(data);
            if(data == 1)
            {
                location.reload();
                //window.location = baseurl+"adm01/adm0101/Cnt_sca01001_Service_PricingPlans/index";
            }
            else
            {
            
            }
        }
        });     
    })
    }
}

function edit_rolesmaster($roleid)
{
    $("#rolesmaster").addClass("show");
    $.ajax({
        url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/getRoleMasterSingleData"); ?>',
        type: 'post',
        data:{'RoleID': $roleid},
        dataType: 'html',
        success: function (data) {
        var parsed = JSON.parse(data); console.log(parsed);
        $.each(parsed, function(key, item) {
            $("#default_roleid").val(item['RoleID']);
            $("#roleid").val(item['RoleID']);
            $("#roletitle").val(item['RoleTitle']);
            $("#roleadmin").val(item['RoleAdmin']);
            $("#roleservice").val(item['RoleParentService']);
            $(".rolebtn").text("Update");
        });
        }
    });
}

function delete_rolesmaster($roleid)
{ 
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this role!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false 
    }, function(){  
        $.ajax({
        url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/deleteRoleMasterData"); ?>',
        type: 'post',
        data:{'RoleID': $roleid},
        dataType: 'html',
        success: function (data) { 
            if(data == 1)
            {
                location.reload();
            }
        }
        });
    });
}

function editRoleAccess($RoleAccessID)
{ 
    $("#rolesaccess").addClass("show");
    $.ajax({
        url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/getRoleAccessSingleData"); ?>',
        type: 'post',
        data:{'RoleAccessID': $RoleAccessID},
        dataType: 'html',
        success: function (data) {
        var parsed = JSON.parse(data); console.log(parsed);
        $.each(parsed, function(key, item) {
            $("#roleaccessid").val(item['RoleAccessID']);
            $("#roleaccesstitle").val(item['RoleAccessParentRole']);
            $("#elementtype").val(item['RoleAccessElementType']);
            $(".roleaccessbtn").text("Update");

                var url;
                if(item['RoleAccessElementType'] == 'F')
                {
                    url="<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/getFunctionsDetails"); ?>";
                }
                if(item['RoleAccessElementType'] == 'S')
                {
                    url="<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/getScreensDetails"); ?>";
                }
                
                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'html',
                    success: function (data) {
                        $("#element").html("");
                        $("#element").append(data); 
                        $("#element").val(item['RoleAccessElement']);       
                    }
                });         
            
        });
        }
    });
}

function deleteRoleAccess($RoleAccessID)
{ 
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false 
    }, function(){  
        $.ajax({
        url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/deleteRoleAccess"); ?>',
        type: 'post',
        data:{'RoleAccessID': $RoleAccessID},
        dataType: 'html',
        success: function (data) { 
            if(data == 1)
            {
                location.reload();
            }
        }
        });
    });
}

function add_functions()
{
    var def_functionid=$('#def_functionid').val();
    var functionid=$('#functionid').val();
    var functiondesc=$('#functiondesc').val();
    var functionaccess=$('#functionaccess').val();
    var functioncomponent=$('#functioncomponent').val();

    if(functionid == '') { $('.functionidgrp').addClass( "has-danger" );  
        $('.functioniderror').html("The Function ID is required"); } 
    else { $('.functionidgrp').removeClass( "has-danger" ); $('.functioniderror').html("");  }
    if(functiondesc == '') { $('.functiondescgrp').addClass( "has-danger" ); $('.functiondescerror').html("The Function Description is required");  } 
    else { $('.functiondescgrp').removeClass( "has-danger" ); $('.functiondescerror').html("");  }
    if(functionaccess == '') { $('.functionaccessgrp').addClass( "has-danger" ); $('.functionaccesserror').html("The Function Access is required"); } 
    else { $('.functionaccessgrp').removeClass( "has-danger" ); $('.functionaccesserror').html(""); }
    if(functioncomponent == '') { $('.functioncomponentgrp').addClass( "has-danger" ); $('.functioncomponenterror').html("The Function Component is required"); } 
    else { $('.functioncomponentgrp').removeClass( "has-danger" ); $('.functioncomponenterror').html("");  }
    
    console.log(functionid+' '+functiondesc+' '+functionaccess+' '+functioncomponent);

    if(functionid != '' && functiondesc != '' && functionaccess != '' && functioncomponent != '')
    {
    $(document).ready(function(){
        var dataString = $("#processesandfunctionsform").serialize();
        console.log(dataString);
        var url="adm01/adm0102/Cnt_sca01002_System_Structure/ProcessesandFunctions"
        $.ajax({
        type:"POST",
        url:"<?php echo base_url() ?>"+url,
        data:dataString,
        success:function (data) {
            console.log(data);
            if(data == 1)
            {
                location.reload();
                //window.location = baseurl+"adm01/adm0101/cnt_sca01001_Service_PricingPlans/index";
            }
            else
            {
            
            }
        }
        });     
    })
    }
}

function deleteFunctions($FunctionID)
{ 
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false 
    }, function(){  
        $.ajax({
        url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/deleteFunctions"); ?>',
        type: 'post',
        data:{'FunctionID': $FunctionID},
        dataType: 'html',
        success: function (data) { 
            if(data == 1)
            {
                location.reload();
            }
        }
        });
    });
}

function add_tables()
{
    var def_tableid=$('#def_tableid').val();
    var tableid=$('#tableid').val();
    var tabledesc=$('#tabledesc').val();
    var tableaccess=$('#tableaccess').val();
    var tablecomponent=$('#tablecomponent').val();

    if(tableid == '') { $('.tableidgrp').addClass( "has-danger" ); $('.tableiderror').html("The Table ID is required"); } 
    else { $('.tableidgrp').removeClass( "has-danger" ); $('.tableiderror').html("");  }
    if(tabledesc == '') { $('.tabledescgrp').addClass( "has-danger" ); $('.tabledescerror').html("The Table Description is required");  } 
    else { $('.tabledescgrp').removeClass( "has-danger" ); $('.tabledescerror').html("");  }
    if(tableaccess == '') { $('.tableaccessgrp').addClass( "has-danger" ); $('.tableaccesserror').html("The Table Access is required"); } 
    else { $('.tableaccessgrp').removeClass( "has-danger" ); $('.tableaccesserror').html(""); }
    if(tablecomponent == '') { $('.tablecomponentgrp').addClass( "has-danger" ); $('.tablecomponenterror').html("The Table Component is required"); } 
    else { $('.tablecomponentgrp').removeClass( "has-danger" ); $('.tablecomponenterror').html("");  }
    
    console.log(tableid+' '+tabledesc+' '+tableaccess+' '+tablecomponent);

    if(tableid != '' && tabledesc != '' && tableaccess != '' && tablecomponent != '')
    {
    $(document).ready(function(){
        var dataString = $("#dbtablesform").serialize();
        console.log(dataString);
        var url="adm01/adm0102/Cnt_sca01002_System_Structure/DatabaseTables"
        $.ajax({
        type:"POST",
        url:"<?php echo base_url() ?>"+url,
        data:dataString,
        success:function (data) {
            console.log(data);
            if(data == 1)
            {
                location.reload();
            }
            else
            {
            
            }
        }
        });     
    })
    }
}

function deleteDBTables($TableID)
{ 
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false 
    }, function(){  
        $.ajax({
        url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/deleteDBTables"); ?>',
        type: 'post',
        data:{'TableID': $TableID},
        dataType: 'html',
        success: function (data) { 
            if(data == 1)
            {
                location.reload();
            }
        }
        });
    });
}

function add_screens()
{
    var def_screenid=$('#def_screenid').val();
    var screenid=$('#screenid').val();
    var screendesc=$('#screendesc').val();
    var screenaccess=$('#screenaccess').val();
    var screencomponent=$('#screencomponent').val();
    var screenlocation=$('#screenlocation').val();

    if(screenid == '') { $('.screenidgrp').addClass( "has-danger" ); $('.screeniderror').html("The Screen ID is required"); } 
    else { $('.screenidgrp').removeClass( "has-danger" ); $('.screeniderror').html("");  }
    if(screendesc == '') { $('.screendescgrp').addClass( "has-danger" ); $('.screendescerror').html("The Screen Description is required");  } 
    else { $('.screendescgrp').removeClass( "has-danger" ); $('.screendescerror').html("");  }
    if(screenaccess == '') { $('.screenaccessgrp').addClass( "has-danger" ); $('.screenaccesserror').html("The Screen Access is required"); } 
    else { $('.screenaccessgrp').removeClass( "has-danger" ); $('.screenaccesserror').html(""); }
    if(screencomponent == '') { $('.screencomponentgrp').addClass( "has-danger" ); $('.screencomponenterror').html("The Screen Component is required"); } 
    else { $('.screencomponentgrp').removeClass( "has-danger" ); $('.screencomponenterror').html("");  }
    if(screenlocation == '') { $('.screenlocationgrp').addClass( "has-danger" ); $('.screenlocationerror').html("The Screen Location is required"); } 
    else { $('.screenlocationgrp').removeClass( "has-danger" ); $('.screenlocationerror').html("");  }
    
    console.log(screenid+' '+screendesc+' '+screenaccess+' '+screencomponent+' '+screenlocation);

    if(screenid != '' && screendesc != '' && screenaccess != '' && screencomponent != '' && screenlocation != '')
    {
    $(document).ready(function(){
        var dataString = $("#screensform").serialize();
        console.log(dataString);
        var url="adm01/adm0102/Cnt_sca01002_System_Structure/Screens"
        $.ajax({
        type:"POST",
        url:"<?php echo base_url() ?>"+url,
        data:dataString,
        success:function (data) {
            console.log(data);
            if(data == 1)
            {
                location.reload();
            }
            else
            {
            
            }
        }
        });     
    })
    }
}

function deleteScreens($ScreenID)
{ 
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false 
    }, function(){  
        $.ajax({
        url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/deleteScreens"); ?>',
        type: 'post',
        data:{'ScreenID': $ScreenID},
        dataType: 'html',
        success: function (data) { 
            if(data == 1)
            {
                location.reload();
            }
        }
        });
    });
}

$(document).ready(function(){

$('.closerolemaster').on('click', function() {
    location.reload();
});

$('.rolebtn').on('click', function() { 
    //    $('form#rolesmasterform').submit();
});

$('#elementtype').on('change', function() { 
    var type =this.value;
    var url;
    if(type == 'F')
    {
        url="<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/getFunctionsDetails"); ?>";
    }
    if(type == 'S')
    {
        url="<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/getScreensDetails"); ?>";
    }
    
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'html',
        success: function (data) {
            $("#element").html("");
            $("#element").append(data);        
        }
    });
    //    $('form#rolesmasterform').submit();
});


$(".updateFunctions").click(function() {
    swal({   
        title: "Are you sure?",   
        text: "You will update this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, update it!",   
        closeOnConfirm: false 
    }, function(){
        var $row = $(this).closest("tr");    // Find the row
        var $tds = $row.find("td");
        var data = [];
        var text,obj;
        obj = {};
        $.each($tds, function() {
            text = $(this).attr('value');
           obj[text] = $(this).text();
           data.push(obj);
        });
        console.log(data[0]);
        $.ajax({
            url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/ProcessesandFunctions"); ?>',
            type: 'post',
            data: data[0],
            dataType: 'html',
            success: function (data) { 
                console.log(data);
                if(data == 1)
                {
                    location.reload();
                }
            }
            });
    });
});

$(".updateTables").click(function() {
    swal({   
        title: "Are you sure?",   
        text: "You will update this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, update it!",   
        closeOnConfirm: false 
    }, function(){
        var $row = $(this).closest("tr");    // Find the row
        var $tds = $row.find("td");
        var data = [];
        var text,obj;
        obj = {};
        $.each($tds, function() {
            text = $(this).attr('value');
            obj[text] = $(this).text();
            data.push(obj);
        });
        console.log(data[0]);
        $.ajax({
            url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/DatabaseTables"); ?>',
            type: 'post',
            data: data[0],
            dataType: 'html',
            success: function (data) { 
                console.log(data);
                if(data == 1)
                {
                    location.reload();
                }
            }
            });
    });
});

$(".updateScreens").click(function() {
    swal({   
        title: "Are you sure?",   
        text: "You will update this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, update it!",   
        closeOnConfirm: false 
    }, function(){
        var $row = $(this).closest("tr");    // Find the row
        var $tds = $row.find("td");
        var data = [];
        var text,obj;
        obj = {};
        $.each($tds, function() {
            text = $(this).attr('value');
            obj[text] = $(this).text();
            data.push(obj);
        });
        console.log(data[0]);
        $.ajax({
            url: '<?php echo base_url("adm01/adm0102/Cnt_sca01002_System_Structure/Screens"); ?>',
            type: 'post',
            data: data[0],
            dataType: 'html',
            success: function (data) { 
                console.log(data);
                if(data == 1)
                {
                    location.reload();
                }
            }
            });
    });
    
});

});
</script>         