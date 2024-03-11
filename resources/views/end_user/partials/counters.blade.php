<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="fas fa-user-md"></i>
                    <span data-purecounter-start="0" data-purecounter-end="@yield('counter_one_count')" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>@yield('counter_one_title')</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div class="count-box">
                    <i class="far fa-hospital"></i>
                    <span data-purecounter-start="0" data-purecounter-end="@yield('counter_two_count')" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>@yield('counter_two_title')</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="fas fa-flask"></i>
                    <span data-purecounter-start="0" data-purecounter-end="@yield('counter_three_count')" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>@yield('counter_three_title')</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="fas fa-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="@yield('counter_four_count')" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>@yield('counter_four_title')</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Counts Section -->
