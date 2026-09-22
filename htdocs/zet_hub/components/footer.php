<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZETHUB Footer</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #111;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .content {
            flex: 1;
            padding: 20px;
            color: white;
        }
        
        footer {
            position: relative;
            background: #0a0a0a;
            color: #aaa;
            padding: 70px 0 30px;
            overflow: hidden;
        }
        
        .footer-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(50, 50, 50, 0.8) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(60, 60, 60, 0.6) 0%, transparent 40%);
            animation: pulse 15s infinite alternate;
            z-index: 1;
        }
        
        @keyframes pulse {
            0% {
                opacity: 0.7;
                transform: scale(1);
            }
            50% {
                opacity: 0.9;
                transform: scale(1.02);
            }
            100% {
                opacity: 0.7;
                transform: scale(1);
            }
        }
        
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }
        
        .footer-col h4 {
            color: #fff;
            font-size: 18px;
            margin-bottom: 25px;
            position: relative;
        }
        
        .footer-col h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, #555, transparent);
        }
        
        .footer-col p {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .footer-col ul {
            list-style: none;
        }
        
        .footer-col ul li {
            margin-bottom: 12px;
        }
        
        .footer-col ul li a {
            color: #aaa;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
        }
        
        .footer-col ul li a:hover {
            color: #fff;
            transform: translateX(5px);
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .logo-section img {
            height: 30px;
            filter: grayscale(100%) brightness(1.5);
            margin-right: 10px;
        }
        
        .logo-section span {
            color: #fff;
            font-weight: 600;
            font-size: 20px;
            letter-spacing: 1px;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #222;
            margin-top: 30px;
            position: relative;
            z-index: 2;
        }
        
        .footer-bottom p {
            font-size: 12px;
            color: #777;
        }
        
        .footer-bottom p a {
            color: #999;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-bottom p a:hover {
            color: #fff;
        }
        
        /* Animated dots */
        .dots {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            overflow: hidden;
        }
        
        .dot {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float linear infinite;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) translateX(200px);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Your main content here -->
    </div>
    
<!-- Start of Footer -->
<footer style="position: relative; background: #0a0a0a; color: #aaa; padding: 70px 0 30px; overflow: hidden;">
    <!-- Animated Background Elements -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at 20% 30%, rgba(50, 50, 50, 0.8) 0%, transparent 40%), radial-gradient(circle at 80% 70%, rgba(60, 60, 60, 0.6) 0%, transparent 40%); animation: footerPulse 15s infinite alternate; z-index: 1;"></div>
    
    <!-- Floating Dots Container -->
    <div class="footer-dots" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; z-index: 1; overflow: hidden;"></div>
    
    <!-- Footer Content -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
        <!-- Column 1 -->
        <div>
            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                <img src="assets/img/logo1.png" alt="WebSphere Logo" style="height: 30px; filter: grayscale(100%) brightness(1.5); margin-right: 10px;">
                <span style="color: #fff; font-weight: 600; font-size: 20px; letter-spacing: 1px;">ZETHUB</span>
            </div>
            <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">We are a leading web development company specializing in modern, scalable, and robust digital solutions. Transforming ideas into impactful online experiences.</p>
            <ul style="list-style: none;">
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Home</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">About</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Blog</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Contact</a></li>
            </ul>
        </div>
        
        <!-- Column 2 -->
        <div>
            <h4 style="color: #fff; font-size: 18px; margin-bottom: 25px; position: relative;">Our Services</h4>
            <ul style="list-style: none;">
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Web Development</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">UI/UX Design</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">E-commerce Solutions</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Cloud Hosting</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">SEO Optimization</a></li>
            </ul>
        </div>
        
        <!-- Column 3 -->
        <div>
            <h4 style="color: #fff; font-size: 18px; margin-bottom: 25px; position: relative;">Quick Links</h4>
            <ul style="list-style: none;">
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Home</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">About Us</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Services</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Portfolio</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="color: #aaa; text-decoration: none; transition: all 0.3s ease; display: block;">Contact</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div style="text-align: center; padding-top: 30px; border-top: 1px solid #222; margin-top: 30px; position: relative; z-index: 2;">
        <p style="font-size: 12px; color: #777;">© 2025 ZET HUB . All Rights Reserved. | <a href="#" style="color: #999; text-decoration: none; transition: all 0.3s ease;">Privacy Policy</a></p>
    </div>
</footer>

<!-- Footer Styles and Scripts -->
<style>
    @keyframes footerPulse {
        0% { opacity: 0.7; transform: scale(1); }
        50% { opacity: 0.9; transform: scale(1.02); }
        100% { opacity: 0.7; transform: scale(1); }
    }
    
    footer h4::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 50px;
        height: 2px;
        background: linear-gradient(90deg, #555, transparent);
    }
    
    footer ul li a:hover {
        color: #fff !important;
        transform: translateX(5px) !important;
    }
    
    .footer-dot {
        position: absolute;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        animation: float linear infinite;
    }
    
    @keyframes float {
        0% { transform: translateY(0) translateX(0); opacity: 1; }
        100% { transform: translateY(-1000px) translateX(200px); opacity: 0; }
    }
</style>

<script>
    // Create floating dots animation
    document.addEventListener('DOMContentLoaded', function() {
        const dotsContainer = document.querySelector('.footer-dots');
        const dotCount = 30;
        
        for (let i = 0; i < dotCount; i++) {
            const dot = document.createElement('div');
            dot.classList.add('footer-dot');
            
            // Random properties for each dot
            const size = Math.random() * 5 + 1;
            const posX = Math.random() * 100;
            const posY = Math.random() * 100 + 100;
            const duration = Math.random() * 20 + 10;
            const delay = Math.random() * 5;
            
            dot.style.width = `${size}px`;
            dot.style.height = `${size}px`;
            dot.style.left = `${posX}%`;
            dot.style.top = `${posY}%`;
            dot.style.animationDuration = `${duration}s`;
            dot.style.animationDelay = `${delay}s`;
            
            dotsContainer.appendChild(dot);
        }
    });
</script>
<!-- End of Footer -->
</body>
</html>