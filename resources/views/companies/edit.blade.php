<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center alert alert-warning"> EDIT COMPANY</h2>
            </div>
            <div>
                <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Job Type</strong>
                            <select name="jobType" id="jobType">
                                <option value="Development">Development</option>
                                <option value="Test">Test</option>
                                <option value="Document">Document</option>
                            </select>
                            @error('jobType')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Job Name</strong>
                            <input type="text" name="jobName" value="{{$company->jobName}}" class="form-control"placeholder="Job Name">
                            @error('jobName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Time To Start</strong>
                            <input type="time" name="timeToStart" value="{{$company->timeToStart}}"class="form-control" >
                            @error('timeToStart')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Time To End</strong>
                            <input type="time" name="timeToEnd" value="{{$company->timeToEnd}}"class="form-control" >
                            @error('timeToEnd')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Status</strong>
                            <select name="Count" id="Count">
                                <option value="Proceed">Proceed</option>
                                <option value="Finish">Finish</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                            @error('Count')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Date and Time of Data Recording</strong>
                            <input type="datetime-local" id="dateRecording"  value="{{$company->dateRecording}}" name="dateRecording">
                            <br>
                            @error('dateRecording')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Last Date and Time To Update</strong>
                            <input type="datetime-local" id="lastDateRecording"  value="{{$company->lastDateRecording}}" name="lastDateRecording">
                            <br>
                            @error('lastDateRecording')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>