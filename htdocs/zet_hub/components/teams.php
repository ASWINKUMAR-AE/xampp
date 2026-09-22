<!-- Team Section -->
<section class="section" id="team">
  <div class="container">
    <div class="row justify-content-center mb-6">
      <div class="col-lg-8 text-center">
        <h2 class="display-2 mb-3">Architects of Digital Monochrome</h2>
        <p class="lead" style="color: var(--black-30);">
          The creative minds who shape our grayscale vision
        </p>
      </div>
    </div>

    <!-- Team Grid Will Be Populated Here -->
    <div class="team-grid" id="teamContainer"></div>
  </div>
</section>

<style>
  /* Enhanced Team Grid Styles */
  .team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2.5rem;
    padding: 3rem 0;
  }

  .team-card {
    perspective: 1000px;
    height: 450px;
    position: relative;
  }

  .team-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
    transform-style: preserve-3d;
  }

  .team-card:hover .team-card-inner {
    transform: rotateY(180deg);
  }

  .team-card-front,
  .team-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    transition: all 0.6s ease;
  }

  .team-card-front {
    background: var(--black-90);
    display: flex;
    flex-direction: column;
  }

  .team-card-back {
    background: linear-gradient(135deg, var(--black-80), var(--black-90));
    transform: rotateY(180deg);
    padding: 2.5rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    border: 1px solid var(--black-70);
  }

  .team-img-container {
    height: 70%;
    overflow: hidden;
    position: relative;
  }

  .team-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(100%) contrast(110%);
    transition: all 0.8s ease;
  }

  .team-logo {
    position: absolute;
    right: 20px;
    top: 20px;
    width: 60px;
    height: 60px;
    opacity: 1.5;
    z-index: 2;
    transition: all 0.5s ease;
  }

  .team-card:hover .team-logo {
    opacity: 0.8;
    transform: scale(1.1);
  }

  .team-card:hover .team-img {
    filter: grayscale(60%) contrast(110%) brightness(0.9);
    transform: scale(1.05);
  }

  .team-overlay {
    height: 30%;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: var(--black-90);
    border-top: 1px solid var(--black-70);
  }

  .team-name {
    font-size: 1.6rem;
    margin-bottom: 0.5rem;
    position: relative;
    display: inline-block;
  }

  .team-name:after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 40px;
    height: 2px;
    background: var(--black-40);
    transition: width 0.3s ease;
  }

  .team-card:hover .team-name:after {
    width: 80px;
  }

  .team-role {
    color: var(--black-40);
    font-size: 0.95rem;
    letter-spacing: 1px;
    text-transform: uppercase;
  }

  .team-bio {
    color: var(--black-20);
    margin-bottom: 1.5rem;
    line-height: 1.6;
  }

  .team-social {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
  }

  .team-social a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--black-70);
    color: var(--white);
    font-size: 1.1rem;
    transition: all 0.3s ease;
  }

  .team-social a:hover {
    background: var(--black-60);
    transform: translateY(-3px);
  }

  .team-skills {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 1.5rem;
    justify-content: center;
  }

  .skill-tag {
    background: var(--black-70);
    color: var(--black-20);
    padding: 0.3rem 0.8rem;
    border-radius: 50px;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
  }

  /* Particle decoration */
  .team-card:before {
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    background: linear-gradient(45deg, 
      transparent 0%, 
      transparent 50%, 
      var(--black-70) 50%, 
      var(--black-70) 100%);
    background-size: 5px 5px;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
    border-radius: 20px;
  }

  .team-card:hover:before {
    opacity: 0.2;
  }

  @media (max-width: 768px) {
    .team-grid {
      grid-template-columns: 1fr;
      max-width: 400px;
      margin: 0 auto;
    }
    
    .team-card {
      height: auto;
      perspective: none;
      margin-bottom: 2rem;
    }
    
    .team-card-inner {
      display: flex;
      flex-direction: column;
      height: auto;
      transform: none !important;
    }
    
    .team-card-front,
    .team-card-back {
      position: relative;
      transform: none;
      height: auto;
      backface-visibility: visible;
    }
    
    .team-img-container {
      height: 300px;
    }
    
    .team-card-back {
      padding: 2rem 1.5rem;
      transform: none;
      border-top: none;
    }
    
    .team-logo {
      width: 50px;
      height: 50px;
      right: 15px;
      top: 15px;
    }
    
    /* Disable hover effects on mobile */
    .team-card:hover .team-img {
      filter: grayscale(100%) contrast(110%);
      transform: none;
    }
    
    .team-card:hover .team-logo {
      opacity: 1;
      transform: none;
    }
    
    .team-card:hover .team-name:after {
      width: 40px;
    }
    
    .team-card:before {
      display: none;
    }
  }

  @media (max-width: 480px) {
    .team-grid {
      padding: 1.5rem 0;
    }
    
    .team-img-container {
      height: 250px;
    }
    
    .team-card-back {
      padding: 1.5rem 1rem;
    }
    
    .team-name {
      font-size: 1.4rem;
    }
    
    .team-role {
      font-size: 0.85rem;
    }
    
    .team-bio {
      font-size: 0.9rem;
    }
  }
</style>

<script>
  // Team Data JSON with logos
  const teamData = [
    {
      "id": 1,
      "name": "Alex Turner",
      "role": "Creative Director",
      "image": "https://images.unsplash.com/photo-1560250097-0b93528c311a",
      "logo": "assets/img/logo1.png",
      "bio": "15 years shaping visual narratives. Believes in the power of constraints to fuel creativity. Leads our design vision with a minimalist approach.",
      "skills": ["Art Direction", "Brand Strategy", "UI/UX", "Typography"],
      "social": [
        {"icon": "bi-twitter", "url": "#"},
        {"icon": "bi-linkedin", "url": "#"},
        {"icon": "bi-dribbble", "url": "#"}
      ]
    },
    {
      "id": 2,
      "name": "Jordan Lee",
      "role": "Lead Developer",
      "image": "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2",
      "logo": "assets/img/logo1.png",
      "bio": "Code poet who transforms complex problems into elegant solutions. Specializes in performant, accessible web applications.",
      "skills": ["JavaScript", "React", "Node.js", "WebGL"],
      "social": [
        {"icon": "bi-github", "url": "#"},
        {"icon": "bi-stack-overflow", "url": "#"},
        {"icon": "bi-twitter", "url": "#"}
      ]
    },
    {
      "id": 3,
      "name": "Taylor Smith",
      "role": "Design Strategist",
      "image": "https://images.unsplash.com/photo-1580489944761-15a19d654956",
      "logo": "assets/img/logo1.png",
      "bio": "Bridges user needs with business goals through systematic design thinking. Creates intuitive experiences with depth.",
      "skills": ["User Research", "Prototyping", "Design Systems", "UX Writing"],
      "social": [
        {"icon": "bi-behance", "url": "#"},
        {"icon": "bi-instagram", "url": "#"},
        {"icon": "bi-pinterest", "url": "#"}
      ]
    },
    {
      "id": 4,
      "name": "Morgan Chase",
      "role": "Motion Designer",
      "image": "https://images.unsplash.com/photo-1494790108377-be9c29b29330",
      "logo": "assets/img/logo1.png",
      "bio": "Brings interfaces to life with purposeful animation. Believes motion should enhance, not distract.",
      "skills": ["After Effects", "Lottie", "3D Animation", "Micro-interactions"],
      "social": [
        {"icon": "bi-behance", "url": "#"},
        {"icon": "bi-instagram", "url": "#"},
        {"icon": "bi-vimeo", "url": "#"}
      ]
    }
  ];

  // Function to generate team cards
  function generateTeamCards() {
    const container = document.getElementById('teamContainer');
    
    teamData.forEach((member, index) => {
      const card = document.createElement('div');
      card.className = 'team-card';
      card.setAttribute('data-aos', 'fade-up');
      card.setAttribute('data-aos-delay', index * 100);
      
      // Generate skills tags
      const skillsTags = member.skills.map(skill => 
        `<span class="skill-tag">${skill}</span>`
      ).join('');
      
      // Generate social icons
      const socialIcons = member.social.map(link => 
        `<a href="${link.url}" class="text-white"><i class="bi ${link.icon}"></i></a>`
      ).join('');
      
      card.innerHTML = `
        <div class="team-card-inner">
          <div class="team-card-front">
            <div class="team-img-container">
              <img src="${member.image}" alt="${member.name}" class="team-img">
              <img src="${member.logo}" alt="Logo" class="team-logo">
            </div>
            <div class="team-overlay">
              <h3 class="team-name">${member.name}</h3>
              <p class="team-role">${member.role}</p>
            </div>
          </div>
          <div class="team-card-back">
            <h3 class="team-name">${member.name}</h3>
            <p class="team-role text-muted mb-3">${member.role}</p>
            <p class="team-bio small">${member.bio}</p>
            <div class="team-skills">${skillsTags}</div>
            <div class="team-social">${socialIcons}</div>
          </div>
        </div>
      `;
      
      container.appendChild(card);
    });
  }

  // Initialize when DOM is loaded
  document.addEventListener('DOMContentLoaded', function() {
    generateTeamCards();
    
    // Initialize AOS after cards are generated
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 800,
        easing: 'ease-in-out-quart',
        once: true,
        offset: 100
      });
    }
  });
</script>

<!-- Add this to your head section -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">