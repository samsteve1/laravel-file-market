<section class="hero is-primary">
    <div class="hero-body">
       
        <div class="level is-mobile">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Totalf iles</p>
                    <p class="title">{{ $fileCount }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total sales</p>
                    <p class="title">{{ $saleCount }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Commission this month</p>
                    <p class="title">NGN{{ number_format($thisMonthCommission, 2) }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Lifetime commission</p>
                        <p class="title">NGN{{ number_format($lifetimeCommission, 2) }}</p>
                    </div>
                </div>
        </div>
    </div>
</section>