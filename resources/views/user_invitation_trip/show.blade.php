
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Trip History </div>

                <div class="panel-body">
                     <div class="row">
        <div class="col-lg-6">
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>destnation_location</th>
                            <th>pickup_location</th>
                            <th>Name</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        foreach ($user_invitation_trip as $member) {
                            echo'  <tr class="active">';
                            //  echo "<td>" . $member->user_id."<td/>";
                            echo "<td>" . $member-> destnation_location . "</td>";
                            echo"<td>" . $member->pickup_location. "</td>";
                            echo "<td>" . $member->name . "</td>";
                             echo "<td>" . $member->trip_time . "</td>";

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
