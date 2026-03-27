<div id="bubbles">
    @php
        $count = 1;
    @endphp
    @foreach(array_chunk($array, 1) as $arr )
    <table>
        @foreach($arr as $ar)
        <tr>

            <td style="background-color:black;">
                <span class="non-circle" style="background-color:black; border:none; color:white;">{{$count}}</span>
            </td>
            <td><span class="circle">A</span></td>
            <td><span class="circle">B</span></td>
            <td><span class="circle">C</span></td>
            <td><span class="circle">D</span></td>
        </tr>
        @php
            $count++;
        @endphp
       @endforeach
    </table>
    @endforeach
</div>