<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Resume</title>
</head>
<body>

    <h1>Education History</h1>
    @foreach($education as $data)
    <ol>
        <li>{{ $data->course_of_education }}</li>
        <li>{{ $data->place_of_education }}</li>
        <li>{{ $data->start_of_education }}</li>
        <li>{{ $data->end_of_education }}</li>
    </ol>
    @endforeach

    <h1>Work Experience</h1>
    @foreach($experience as $data)
    <ol>
        <li>{{ $data->name_of_employer }}</li>
        <li>{{ $data->position_of_job }}</li>
        <li>{{ $data->start_of_employer }}</li>
        <li>{{ $data->end_of_employer }}</li>
    </ol>
    @endforeach
</body>
</html>