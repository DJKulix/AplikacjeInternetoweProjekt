<html lang="en">
@include('shared.header')

<body class="bg-light">
@include('shared.nav')
<div class="container">
<table class="table table-striped table-sm">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Cost</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
        $statusArray = array(
            0=> "Placed",
            1=> "Ongoing",
            2=> "Ended"
        )
        ?>
    @forelse($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->name}}
            <td>{{$statusArray[$event->status]}}
            <td>{{$event->startDate}}</td>
            <td>{{$event->endDate}}</td>
            <td>{{$event->price}}</td>
            <td>
                <a class="nav-link link-dark px-2" href="{{ route('event.show', $event->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg> </a></td>
        </tr>
        @empty
            <p>No data</p>
        @endforelse
    </tbody>
</table>
</div>
@include('shared.footer')
</body>
</html>
