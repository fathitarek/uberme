@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">List Members</div>

                <div class="panel-body">
                     <div class="row">
        <div class="col-lg-6">
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile Phone</th>
                            <th>E-mail</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        foreach ($members as $member) {
                            echo'  <tr class="active">';
                            //  echo "<td>" . $member->user_id."<td/>";
                            echo "<td>" . $member->name . "</td>";
                            echo"<td>" . $member->phone_number . "</td>";
                            echo "<td>" . $member->email . "</td>";
                            if ($member->status == 1) {
                                //  echo "statusis ->open notification: == " . $member->status."<br/>";
                                echo "<td>" . "open notification" . "</td>";
                            } else {
                                echo "<td>" . "close notification" . "</td>";

                                // echo "statusis ->close notification: == " . $member->status."<br/>";
                            }
                        }
                        ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
   
    @endsection
