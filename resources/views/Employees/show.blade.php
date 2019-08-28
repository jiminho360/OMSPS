<table class="table table-bordered table-striped">
    <tr>
        <th>Full Name</th>
        <td>{{$Employee->first_name." ".$Employee->middle_name." ".$Employee->surname}}</td>
        <?php $Age_one = date('Y',strtotime($Employee->birth_date));
        $Age_two = date('Y')?>
        <th>Age</th>
        <td>{{$Age_two - $Age_one." Years"}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{$Employee->Email}}</td>
        <th>Phone</th>
        <td>{{$Employee->phone}}</td>
    </tr>

    <tr>
        <th>Physical Address</th>
        <td>{{$Employee->Address}}</td>
        <th>Subject</th>
        <td>{{$Employee->Subject}}</td>
    </tr>

    <tr>
        <th>Gender</th>
        <td>{{$Employee->gender}}</td>
        <th>Nationality</th>
        <td>{{$Employee->nationality->name}}</td>
    </tr>
    <tr>
        <th>Religion</th>
        <td>{{$Employee->religion->name}}</td>
        <th></th>
        <td></td>
    </tr>
</table>


