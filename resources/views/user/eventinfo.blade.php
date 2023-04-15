<html lang="en">
@include('shared.header')

<body class="bg-light">
@include('shared.nav')
<div class="container">
    <div class="row justify-content-center mb-3">
        <h3>Event info</h3>

        <table class="table table-striped table-sm">
            <tbody>
            <?php
            $statusArray = array(
                0=> "Placed",
                1=> "Ongoing",
                2=> "Ended"
            )
            ?>
            <tr>
                <td>Event ID</td>
                <td>{{$event->id}}</td>
            </tr>
            <tr>
                <td>User ID</td>
                <td>{{$event->userID}}</td>
            </tr>
            <tr>
                <td>Event name</td>
                <td>{{$event->name}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{$statusArray[$event->status]}}</td>
            </tr>
            <tr>
                <td>Start date</td>
                <td>{{$event->startDate}}</td>
            </tr>
            <tr>
                <td>End date</td>
            <td>{{$event->endDate}}</td>
            </tr>
            <tr>
                <td>Cost</td>
            <td>{{$event->price}}</td>
            </tr>
            <tr>
                <td>Paid cost</td>
            <td>{{$event->paidPrice}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{$event->description}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center mb-3">
        <h3>Rented equpiment</h3>
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Equipment ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                </tr>
                </thead>
               <tbody>
               @foreach($equipments as $equipment)
                   <tr>
                       <td>{{$equipment->equipmentID}}</td>
                       <td>{{\App\Models\Equipment::where('id', '=', $equipment->equipmentID)->pluck('name')}}</td>
                       <td>{{$equipment->quantity}}</td>
                   </tr>
               @endforeach
               </tbody>
            </table>
        @can('is-admin')
            @if($event->status != 2)
        <a  class="btn btn-info" type="button" href="{{route('event.edit', $event)}}">Return</a>
{{--            <a  class="btn btn-info" type="button" href="{{route('user.index')}}">Return</a>--}}
            @endif
        @endcan
</div>
@include('shared.footer')
</body>
</html>
