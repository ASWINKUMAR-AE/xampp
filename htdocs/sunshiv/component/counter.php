<!-- Counter Section -->
<section class="counter py-5" style="background-color: #0f0b33; color: #fff; position: relative; overflow: hidden;">
    <div class="container">
        <div class="counter__content text-center">
            <div class="row gy-4 justify-content-center">
                <!-- Counter Item 1 -->
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                    <div class="counter__item glass-card">
                        <img src="img/icons/ci-1.png" alt="Completed Projects" class="counter-icon">
                        <h2 class="counter_num" data-count="230">0</h2>
                        <p>Completed Projects</p>
                    </div>
                </div>
                <!-- Counter Item 2 -->
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="counter__item glass-card">
                        <img src="img/icons/ci-2.png" alt="Happy Clients" class="counter-icon">
                        <h2 class="counter_num" data-count="1068">0</h2>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <!-- Counter Item 3 -->
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="counter__item glass-card">
                        <img src="img/icons/ci-3.png" alt="Prospective Clients" class="counter-icon">
                        <h2 class="counter_num" data-count="345">0</h2>
                        <p>Prospective Clients</p>
                    </div>
                </div>
                <!-- Counter Item 4 -->
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="counter__item glass-card">
                        <img src="img/icons/ci-4.png" alt="Ongoing Projects" class="counter-icon">
                        <h2 class="counter_num" data-count="128">0</h2>
                        <p>Ongoing Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSS for Styling -->
<style>
/* Counter Section Background */
.counter {
    position: relative;
    background: linear-gradient(135deg, #100028,rgba(16, 0, 40, 0.9),rgb(38, 16, 102));
    padding: 50px 0;
    overflow: hidden;
}

/* Glassmorphism Card Design */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 55px;
    padding: 30px 15px;
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
    display: flex;
    color: #fff;
}

/* Hover Effects */
.glass-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
}

/* Icon Styling */
.counter-icon {
    width: 60px;
    height: 60px;
    margin-bottom: 20px;
}

/* Counter Number Styling */
.counter_num {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #fff;
    transition: color 0.3s;
}

/* Paragraph Styling */
.counter p {
    margin: 0;
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
}

/* Animated Background Elements */
.counter::before {
    content: '';
    position: absolute;
    top: -50px;
    left: -50px;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent);
    animation: rotate 10s linear infinite;
    border-radius: 50%;
    z-index: 1;
}

.counter::after {
    content: '';
    position: absolute;
    bottom: -50px;
    right: -50px;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent);
    animation: rotate 8s linear infinite reverse;
    border-radius: 50%;
    z-index: 1;
}

/* Keyframes for Animation */
@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>

<!-- JavaScript for Counter Animation -->
<script>
    // Counter Animation
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.counter_num');
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-count');
                const count = +counter.innerText;

                const increment = target / 100;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target;
                }
            };

            updateCount();
        });
    });
</script>

