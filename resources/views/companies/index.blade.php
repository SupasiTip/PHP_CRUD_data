<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD  Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-10">

        <h1 class="text-center pt4 text-primary col pt-4 pb-4">Laravel 9 CRUD Exaple</h1>  
            <hr>
            <form action="/filter" method="GET">
                    <div class="row">

                        <div class="col-md-6 pt-4">
                            <a href="{{route('companies.create')}}"class = "btn btn-success"> + Create Company </a>
                        </div>

                        <div class="col-md-auto">
                            <label>Filter by Date</label>
                            <input type="date" id="dateFilter" name="dateFilter" class="form-control">
                        </div>

                        <div class="col-md-auto pt-4">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>

                        <div class="col-md-auto">
                            <label>Filter by Month</label>
                            <input type="month" id="monthFilter" name="monthFilter" class="form-control">
                        </div>

                        <div class="col-md-auto pt-4">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>

                        <div class="col pt-4">
                            <a href="{{ route('companies.index') }}"></a>
                            <button class="btn btn-danger" id="clear-search" value="clear">Clear</button>
                        </div>
                    
                    </div>
            </form>
            <hr>

            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif

            <table class="table table-bordered border-dark table-striped">
                <tr class="table table-primary border-dark">
                    <th>No.</th>
                    <th>Job Type</th>
                    <th>Job Name</th>
                    <th>Time To Start</th>
                    <th>Time To End</th>
                    <th>Status</th>
                    <th>Date and Time of Data Recording</th>
                    <th>Last Date and Time To Update</th>
                    <th>Action</th>
                </tr>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        
                        @if($company->jobType=='Development')
                            <td class="table-info border-dark">{{ $company->jobType}}</td>
                        @elseif($company->jobType=='Test')
                            <td class="table-success border-dark">{{ $company->jobType}}</td>
                        @elseif($company->jobType=='Document')
                            <td class="table-warning border-dark">{{ $company->jobType}}</td>
                        @endif

                        <td>{{ $company->jobName}}</td>
                        <td>{{ $company->timeToStart}}</td>
                        <td>{{ $company->timeToEnd}}</td>

                        @if($company->Count=='Proceed')
                            <td class="table-warning border-dark">{{ $company->Count}}</td>
                        @elseif($company->Count=='Finish')
                            <td class="table-success border-dark">{{ $company->Count}}</td>
                        @elseif($company->Count=='Cancel')
                            <td class="table-danger border-dark">{{ $company->Count}}</td>
                        @endif

                        <td>{{ $company->dateRecording}}</td>
                        <td>{{ $company->lastDateRecording}}</td>
                        <td>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </table>

            @php
                $ProceedStatus = 0;
                $FinishStatus = 0;
                $CancelStatus = 0;
            @endphp

            @foreach($companies as $company)
                @php
                   
                    if($company->Count=='Proceed'){
                        
                        $ProceedStatus++;

                    }else if($company->Count=='Finish') {

                        $FinishStatus++;
                    
                    }else if($company->Count=='Cancel'){

                        $CancelStatus++;
                    }
                @endphp

            @endforeach

            <p class="alert alert-warning col-md-2  text-center">Proceed Status: {{ $ProceedStatus }}</p>
            <p class="alert alert-success col-md-2  text-center">Finish Status: {{ $FinishStatus }}</p>
            <p class="alert alert-danger col-md-2 text-center ">Cancel Status: {{ $CancelStatus }}</p>
            
    {!!$companies->links('pagination::bootstrap-5')!!}
    </div>
    
</body>
</html>

