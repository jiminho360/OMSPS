<style>
    td {
        padding: 4px;
    }
    th.rotate {
        height: 140px;
        white-space: nowrap;
        width: 70%;
    }

    div {
        transform:
                translate(-9px, 0px)
                rotate(-90deg);
        width: 30px;
        height: 12px;
    }
    .mmm{
        width: 50%;
    }
</style>

{{--<img src="{{asset('asset/images/logo.png')}}" style="margin-left: 22%; font-size: large">--}}
<img src="{{public_path('asset/images/logo.png')}}" style="margin-left: 22.5%; margin-top:-5%"><br><br>
<table style="width: 103.2%; margin-top:-2%; border-collapse: collapse" border="1">
    <tr>
        <td>Type of Examination: <span style="color: red; font-weight: bolder">MID TERM EXAMINATION</span></td>
        <td>Month & Year: <span style="color: red; font-weight: bolder">{{date('M Y')}}</span></td>
    </tr>
    <tr>
        <td>Pupils Full Name: <span style="color: red; font-weight: bolder">{{$student->first_name." ".$student->last_name." ".$student->surname}}</span></td>
        <td>Admission Year:<span style="color: red; font-weight: bolder">{{" ".$student->admission_year}}</span></td>
    </tr>
    <tr>
        <td>Class: <span style="color: red; font-weight: bolder">Standard II</span></td>
        @php  $currentYear = date('Y'); @endphp
        <td>Number of Pupils in a class: <span style="color: red; font-weight: bolder">{{count(\App\models\Student::getStudents($currentYear))}}</span></td>
    </tr>
    <tr>
        <td>Closing Day (if applicable): .......................</td>
        <td>Opening Day (if applicable): .......................</td>
    </tr>

</table><br><br>

<table class="mmm" style="width:100%;margin-top:-3.5%; border-collapse:collapse" border="1" >
    <tr >
        <th class="rotate"><div style="margin-top:10%"><span>S/N</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>ITEM</span></div></th>
        <th class="rotate" style="width: 2%"><div style="margin-top: 10%"><span>Mathematics</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Reading</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Writing</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Science</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>AGGREGATE</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>AVERAGE</span></div></th>
    </tr>
    <tr>
        <td><b>1</b></td>
        <td><b>Subject top score %</b></td>
        <td class="centered">{{$max1 = \App\Models\Grades\Std2::maxMath($results->term)}}</td>
        <td class="centered">{{$max2 = \App\Models\Grades\Std2::maxRead($results->term)}}</td>
        <td class="centered">{{$max3 = \App\Models\Grades\Std2::maxWr($results->term)}}</td>
        <td class="centered">{{$max4 = \App\Models\Grades\Std2::maxSc($results->term)}}</td>
        <td class="centered">{{round($max5 = $max1 + $max2 + $max3 + $max4)}}</td>
        <td class="centered">{{round($max5/4)}}</td>
    </tr>
    <tr>
        <td><b>2</b></td>
        <td><b>Class average</b></td>
        <td class="centered">{{round($avg1 =\App\Models\Grades\Std2::avgMath($results->term))}}</td>
        <td class="centered">{{round($avg2 =\App\Models\Grades\Std2::avgRead($results->term))}}</td>
        <td class="centered">{{round($avg3 =\App\Models\Grades\Std2::avgWr($results->term))}}</td>
        <td class="centered">{{round($avg4 =\App\Models\Grades\Std2::avgSc($results->term))}}</td>
        <td class="centered">{{round($avg5 = $avg1 + $avg2 + $avg3 + $avg4)}}</td>
        <td class="centered">{{round($avg5/4)}}</td>
    </tr>
    <tr>
        <td><b>3</b></td>
        <td><b>Pupil's score</b></td>
        @php $sub1 = $results->Mathematics;$sub2 = $results->Reading; $sub3 = $results->Writing;
        $sub4 = $results->Science;
        @endphp
        <td class="centered">{{$results->Mathematics}}</td>
        <td class="centered">{{$results->Reading}}</td>
        <td class="centered">{{$results->Writing}}</td>
        <td class="centered">{{$results->Science}}</td>
        <td class="centered">{{round($resultAll = $sub1+$sub2+$sub3+$sub4)}}</td>
        <td class="centered">{{round($resultAll/4)}}</td>
    </tr>
    <tr>
        <td><b>4</b></td>
        <td colspan="7"><strong>Pupil's class position (Nafasi aliyoshika darasani):</strong><span style="color:red;font-weight: bolder">{{" ".$studentPosition." "}}</span>
            <strong>Class roster (Wanafunzi darasani):</strong> <span style="color: red; font-weight: bolder">{{count(\App\models\Student::getStudents($currentYear))}}</span></td>

    </tr>
    <tr>
        <td><b>5</b></td>
        <td colspan="7"><strong>Class teacher's comments (Maelezo ya mwalimu wa darasa):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................

            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> .................................
        </td>

    </tr>
    <tr>
        <td><b>6</b></td>
        <td colspan="7"><strong>Headteacher's comments (Maelezo ya Mwalimu Mkuu):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................
            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> .................................
        </td>

    </tr>
    <tr>
        <td><b>7</b></td>
        <td colspan="7"><strong>Parent's acknowledgement and comments (Maelezo ya mzazi):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................
            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> .................................
        </td>

    </tr>


</table>
