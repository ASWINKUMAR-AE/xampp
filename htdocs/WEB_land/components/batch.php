<style>
  .timeline-steps {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }

  .timeline-steps .timeline-step {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin: 1rem;
  }

  @media (min-width: 768px) {
    .timeline-steps .timeline-step:not(:last-child):after {
      content: "";
      display: block;
      border-top: .25rem dotted #3b82f6;
      width: 3.46rem;
      position: absolute;
      left: 7.5rem;
      top: .3125rem;
    }

    .timeline-steps .timeline-step:not(:first-child):before {
      content: "";
      display: block;
      border-top: .25rem dotted #3b82f6;
      width: 3.8125rem;
      position: absolute;
      right: 7.5rem;
      top: .3125rem;
    }
  }

  .timeline-steps .timeline-content {
    width: 10rem;
    text-align: center;
  }

  .timeline-steps .timeline-content .inner-circle {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #3b82f6;
  }

  .timeline-steps .timeline-content .inner-circle:before {
    content: "";
    background-color: #3b82f6;
    display: inline-block;
    height: 3rem;
    width: 3rem;
    min-width: 3rem;
    border-radius: 6.25rem;
    opacity: .5;
  }
</style>

<div class="m-2 bg-light" id="batch">
  <header class="text-center mb-5">
    <h1 class="h2 font-weight-bold">Select Your Batch</h1>
    <p class="text-muted">
      Choose your batch to view details and resources tailored to your academic year and curriculum.
      Empower yourself with the right tools to excel in your projects and studies.
    </p>
  </header>
  <section class="container my-5 bg-light">
    <div class="row">
      <div class="col">
        <div class="timeline-steps" id="timeline-container">
          <!-- Timeline steps will be dynamically injected here -->
        </div>
      </div>
    </div>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const batches = [
      { year: "2025", range: "2022-2025" },
      { year: "2026", range: "2023-2026" },
      { year: "2027", range: "2024-2027" },
      { year: "2028", range: "2025-2028" },
      { year: "2029", range: "2026-2029" }
    ];

    const timelineContainer = document.getElementById('timeline-container');

    // Generate timeline steps dynamically
    batches.forEach(batch => {
      const step = document.createElement('div');
      step.className = 'timeline-step';
      step.innerHTML = `
        <a href="next.php?batch=${batch.range}" class="timeline-content" 
           data-bs-toggle="popover" 
           data-bs-trigger="hover" 
           data-bs-placement="top" 
           title="Batch ${batch.range}" 
           data-bs-content="Details and resources for the Batch of ${batch.range}.">
          <div class="inner-circle"></div>
          <p class="h6 mt-3 mb-1">${batch.year}</p>
          <p class="h6 text-muted mb-0 mb-lg-0">Batch ${batch.range}</p>
        </a>
      `;
      timelineContainer.appendChild(step);
    });

    // Initialize Bootstrap popovers
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    const popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl);
    });
  });
</script>
