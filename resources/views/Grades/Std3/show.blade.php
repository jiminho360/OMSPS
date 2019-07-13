<table class="table table-bordered table-striped">
    <tr>
        <th>Student Name</th>
        <td>{{$item->student->first_name." ".$item->student->last_name}}</td>
        <th>Mathematics</th>
        <td>{{$item->Mathematics}}</td>
    </tr>

    <tr>
        <th>English</th>
        <td>{{$item->English}}</td>
        <th>Kiswahili</th>
        <td>{{$item->Kiswahili}}</td>
    </tr>

    <tr>
        <th>Science</th>
        <td>{{$item->Science}}</td>
        <th>ICT</th>
        <td>{{$item->ICT}}</td>
    </tr>

    <tr>
        <th>PDS</th>
        <td>{{$item->PDS}}</td>
        <th>History</th>
        <td>{{$item->History}}</td>
    </tr>

    <tr>
        <th>Geography</th>
        <td>{{$item->Geography}}</td>
        <th>Civics</th>
        <td>{{$item->Civics}}</td>
    </tr>

    <tr>
        <th>Vocational_Skills</th>
        <td>{{$item->Vocational_Skills}}</td>
        <td></td>
        <td></td>
    </tr>
</table>


