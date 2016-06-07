@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <form class="form-horizontal" role="form" method="POST" >
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="pick_location" class="col-md-4 control-label">PickUp Location
                            </label>
                        </div>
                            <div class="col-md-6">
                                <input id="pick_location" type="text" class="form-control" name="pickup_location" >
                        </div>

                              <div class="form-group">
                            <label for="dest_location" class="col-md-4 control-label">destination Location
                            </label>
                        </div>
                            <div class="col-md-6">
                                <input id="dest_location" type="text" class="form-control" name="destination_location" >
                        </div>


                        <div class="form-group">

                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-enter"></i> Login
                                </button>
                        </div>
                        </div>
                    </form>

            <div class="panel panel-default">


                <div class="panel-heading">List Trips</div>

                <div class="panel-body">
                     <div class="row">
        <div class="col-lg-6">
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        foreach ($trip as $trip) {
                            echo'  <tr class="active">';
                            //  echo "<td>" . $member->user_id."<td/>";
                            echo "<td>" . $trip->pickup_location . "</td>";
                            echo"<td>" . $trip->destnation_location . "</td>";
                            echo "<td>" . $trip->trip_time . "</td>";
                           
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
