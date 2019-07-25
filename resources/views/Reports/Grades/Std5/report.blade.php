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

<img src="{{asset('asset/images/logo.png')}}" style="margin-left: 22%; font-size: large">

<table style="width: 102.8%; margin-top:-2%; border-collapse: collapse" border="1">
    <tr>
        <td>Type of Examination: <span style="color: red; font-weight: bolder">MID TERM EXAMINATION</span></td>
        <td>Month & Year: <span style="color: red; font-weight: bolder">{{date('M Y')}}</span></td>
    </tr>
    <tr>
        <td>Pupils full  Name: ...............................................................</td>
        <td>Admission Number: .......................</td>
    </tr>
    <tr>
        <td>Class: .......................</td>
        <td>Number of Puplis in a class: ...........</td>
    </tr>
    <tr>
        <td>Closing Day (if applicable): .......................</td>
        <td>Opening Day (if applicable): .......................</td>
    </tr>

</table><br><br>

<table class="mmm" style="margin-top:-3.5%; border-collapse:collapse;" border="1" >
    <tr >
        <th class="rotate" width="10%"><div style="margin-top:10%"><span>S/N</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>ITEM</span></div></th>
        <th class="rotate" style="width: 2%"><div style="margin-top: 10%"><span>Math</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>English</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Kiswahili</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Science&Tech</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Civics&Moral</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>S/Studies</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span data-width="2%">V/Skills</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span >AGGREG</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>AVERAGE</span></div></th>
    </tr>
    <tr>
        <td><b>1</b></td>
        <td><b>Subject top score %</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><b>2</b></td>
        <td><b>Class average</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><b>3</b></td>
        <td><b>Pupil's score</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

</table>

<table class="mmm" style="width: 102.8%;margin-top:0.2%; border-collapse:collapse" border="1" >
    <tr>
        <td><b>4</b></td>
        <td colspan="7"><strong>Pupil's class position (Nafasi aliyoshika darasani):</strong>........... <strong>Class roster (Wanafunzi darasani):</strong>.............</td>

    </tr>
    <tr>
        <td><b>5</b></td>
        <td colspan="7"><strong>Class teacher's comments (Maelezo ya mwalimu wa darasa):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................

            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> ..................................
        </td>

    </tr>
    <tr>
        <td><b>6</b></td>
        <td colspan="7"><strong>Headteacher's comments (Maelezo ya Mwalimu Mkuu):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................
            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> ..................................
        </td>

    </tr>
    <tr>
        <td><b>7</b></td>
        <td colspan="7"><strong>Parent's acknowledgement and comments (Maelezo ya mzazi):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................
            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> ..................................
        </td>

    </tr>
</table>