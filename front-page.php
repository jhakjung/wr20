<?php get_header();?>



    <!-- Row 2: Favorite Section -->
    <div class="section-title">즐겨찾기</div>
    <div class="d-flex justify-content-center mb-3 gap-2">
        <button class="btn btn-primary">시험서</button>
        <button class="btn btn-primary">견적서</button>
        <button class="btn btn-primary">실적보고</button>
    </div>

    <hr>

    <!-- Row 3: Issue Section -->
    <div class="section-title">이슈</div>
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
        <button class="btn btn-issue">회의록</button>
        <button class="btn btn-issue">실적보고</button>
        <button class="btn btn-issue">LTE-R</button>
        <button class="btn btn-issue">전파간섭</button>
        <button class="btn btn-issue">#회의록</button>
        <button class="btn btn-issue">#회의록</button>
        <button class="btn btn-issue">#회의록</button>
        <button class="btn btn-issue">#회의록</button>
        <button class="btn btn-issue">#회의록</button>
        <button class="btn btn-issue">보고자료</button>
    </div>

    <hr>

    <!-- Row 4: 성과물 Section with Nested Table -->
    <div class="section-title">성과물</div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Box 1 -->
        <div class="col">
            <div class="card h-100">
                <div class="card-header text-center success-bg">
                    <a href="#" class="text-white">01 계약 단계</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">제안요청서</a></li>
                    <li class="list-group-item"><a href="#">제안서</a></li>
                    <li class="list-group-item"><a href="#">계약서</a></li>
                    <li class="list-group-item"><a href="#">선정통보</a></li>
                </ul>
            </div>
        </div>

        <!-- Box 2 -->
        <div class="col">
            <div class="card h-100">
                <div class="card-header text-center success-bg">
                    <a href="#" class="text-white">02 착수 단계</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">착수제</a></li>
                    <li class="list-group-item"><a href="#">착수회의회의록</a></li>
                    <li class="list-group-item"><a href="#">품질경영계획서</a></li>
                    <li class="list-group-item"><a href="#">공정일정계획서</a></li>
                    <li class="list-group-item"><a href="#">교육계획서</a></li>
                    <li class="list-group-item"><a href="#">계약자정보제출</a></li>
                </ul>
            </div>
        </div>

        <!-- Additional Boxes (Box 3 to Box 12) -->
        <!-- Repeat similar structure for each additional box, changing title and items accordingly -->
    </div>

    <hr>






<?php get_footer();?>