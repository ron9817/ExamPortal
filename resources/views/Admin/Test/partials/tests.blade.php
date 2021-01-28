<!-- Tests List -->
<div id="tests" class="new-window mb-5">
<div id="new_tests" class="pl-4">
    <div class="row w-100 table-search p-2 rounded">
        <div class="col col-sm-6 col-lg-3">
            <input id="search2" class="form-control" type="search" placeholder="Search tests" aria-label="Search">
        </div>
        <div class="col d-none d-lg-block pt-2 col-lg-2 hide-c text-center">Registered</div>
        <div class="col d-none d-lg-block pt-2 col-lg-2 hide-c text-center">Appeared</div>
        <div class="col d-none d-lg-block pt-2 col-lg-2 hide-c text-center">Top Score</div>
        <!-- <div class="col d-none d-lg-block pt-2 col-lg-1 hide-c text-center">Failed</div> -->
        <div class="col col-sm-6 col-lg-3 d-flex align-items-center justify-content-end">Status</div>
    </div>

    @foreach ($exams as $exam)
    <div class="row w-100 my-2 pyexams tests">
        <div class="col col-sm-6 col-lg-3">
            <span class="row-title">{{ $exam['name'] }}</span> <br>
            <span class="test-labels"> {{ date('d/m/Y H:i', strtotime($exam->start_time)) }}</span>
        </div>
        <div class="col d-none d-lg-block col-lg-2 hide-c test-numbers text-center">200</span></div>
        <div class="col d-none d-lg-block col-lg-2 hide-c test-numbers text-center">180</span></div>
        <div class="col d-none d-lg-block col-lg-2 hide-c test-numbers text-center">100</span></div>
        <!-- <div class="col d-none d-lg-block col-lg-1 hide-c test-numbers text-center">80</span></div> -->
        <div align="right" class="col col-sm-6 col-lg-3">
            <a class="detials-link" href="<?= url("admin/test/{$exam['id']}"); ?>">See Detials</a> <br>

            @if( $exam['is_active'] )
                <svg height="10" width="10">
                    <circle cx="5" cy="5" r="4" stroke="red" stroke-width="3" fill="red" />
                </svg>
                <span style="color:red;">Live</span>
            @elseif( $exam['is_published']==2 )
                <svg height="10" width="10">
                    <circle cx="5" cy="5" r="4" stroke="#37bf37" stroke-width="3" fill="#37bf37" />
                </svg>
                <span style="color:#37bf37;">Completed</span>
            @elseif( $exam['is_published'] )
                <svg height="10" width="10">
                    <circle cx="5" cy="5" r="4" stroke="#00aba9" stroke-width="3" fill="#00aba9" />
                </svg>
                <span style="color:#00aba9;">Upcoming</span>
            @else
                <svg height="10" width="10">
                    <circle cx="5" cy="5" r="4" stroke="#3977de" stroke-width="3" fill="#3977de" />
                </svg>
                <span style="color:#3977de;">Drafted</span>
            @endif
        </div>
    </div>
    @endforeach

</div>