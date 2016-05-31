@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">List Members</div>

                <div class="panel-body">
                    <?php
                    foreach ($members as $member) {
                        echo "iD:" . $member->user_id."<br/>";
                        echo "Name:" . $member->name."<br/>";
                        echo"PhoneNumber:" . $member->phone_number."<br/>";
                        echo "E-mail:" . $member->email."<br/>";
                        if ($member->status == 1) {
                            echo "statusis ->open notification: == " . $member->status."<br/>";
                        } else {
                            echo "statusis ->close notification: == " . $member->status."<br/>";
                        }
                        echo '********';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
