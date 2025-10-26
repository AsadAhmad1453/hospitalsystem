@extends('patient.layouts.main')

@section('custom-css')
<style>
  .breadcrumb-item+.breadcrumb-item:before {
    content: '' !important;
  }

  .video-thumb {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
  }

  .video-thumb img {
    width: 100%;
    border-radius: 10px;
  }

  .video-thumb .play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 36px;
    color: #fff;
    background: rgba(0, 0, 0, 0.4);
    padding: 14px 18px;
    border-radius: 50%;
  }

  .video-thumb .play-btn:hover {
    background: rgba(0, 0, 0, 0.6);
  }

  .module-card img {
    height: 180px;
    object-fit: cover;
  }

  @media (max-width: 768px) {
    .module-card img {
      height: 150px;
    }
  }
</style>
@endsection

@section('content')
<div class="container-fluid mt-2">
  <div class="bg-theme-1-subtle rounded px-2 py-2">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item bi"><a href="{{route('patient-dashboard')}}">Dashboard</a> <i class="fa fa-angle-right"></i></li>
              <li class="breadcrumb-item active bi" aria-current="page">Learning Modules</li>
          </ol>
      </nav>
  </div>
</div>

<div class="container mt-3" id="main-content">

  <!-- Featured Medical Learning Carousel -->
  <div class="swiper swipernav mb-3" data-pagination="{el: '.swiper-pagination'}">
      <div class="swiper-wrapper">

          <div class="swiper-slide">
              <div class="card adminuiux-card bg-theme-1 position-relative overflow-hidden">
                  <div class="coverimg h-100 w-100 start-0 top-0 position-absolute z-index-0 opacity-50">
                      <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=800&q=80" alt="Nutrition & Wellness" />
                  </div>
                  <div class="card-body z-index-1 px-xl-4 pt-xl-4 position-relative">
                      <p><span class="badge badge-light rounded-pill bg-pink text-white">Nutrition & Wellness</span></p>
                      <h4>Understanding Balanced Diets for Optimal Health</h4>
                      <p class="small my-3">
                          Learn the science behind macro and micronutrients, daily calorie needs, and how to build a healthy diet for your age group and lifestyle.
                      </p>
                      <p>
                          <a href="https://www.youtube.com/watch?v=xyz123" target="_blank" class="btn btn-accent">Watch Lesson</a>
                      </p>
                  </div>
              </div>
          </div>

          <div class="swiper-slide">
              <div class="card adminuiux-card bg-success text-white position-relative overflow-hidden">
                  <div class="coverimg h-100 w-100 start-0 top-0 position-absolute z-index-0 opacity-25">
                      <img src="https://images.unsplash.com/photo-1588776814546-27a13c91f94b?auto=format&fit=crop&w=800&q=80" alt="Heart Health" />
                  </div>
                  <div class="card-body z-index-1 px-xl-4 pt-xl-4 position-relative">
                      <p><span class="badge badge-light rounded-pill bg-green text-white">Cardiology</span></p>
                      <h4>Basics of Heart Health & Blood Pressure Management</h4>
                      <p class="small my-3">A beginner-friendly module about cardiovascular care, hypertension, and preventive health tips from medical experts.</p>
                      <p>
                          <a href="https://www.youtube.com/watch?v=abc456" target="_blank" class="btn btn-light">Watch Lesson</a>
                      </p>
                  </div>
              </div>
          </div>

          <div class="swiper-slide">
              <div class="card adminuiux-card bg-theme-1 position-relative overflow-hidden">
                  <div class="coverimg h-100 w-100 start-0 top-0 position-absolute z-index-0 opacity-50">
                      <img src="https://images.unsplash.com/photo-1550831107-1553da8c8464?auto=format&fit=crop&w=800&q=80" alt="Mental Health" />
                  </div>
                  <div class="card-body z-index-1 px-xl-4 pt-xl-4 position-relative text-white">
                      <p><span class="badge badge-light rounded-pill bg-blue text-white">Mental Health</span></p>
                      <h4>Managing Stress & Anxiety Effectively</h4>
                      <p class="small my-3">Discover practical coping mechanisms and learn when to seek help through guided mindfulness sessions.</p>
                      <p>
                          <a href="https://www.youtube.com/watch?v=def789" target="_blank" class="btn btn-accent">Watch Lesson</a>
                      </p>
                  </div>
              </div>
          </div>

      </div>
      <div class="swiper-pagination"></div>
  </div>

  <!-- Core Learning Modules -->
  <div class="row gx-3">
      <div class="col-12 col-md-6">
          <div class="card adminuiux-card module-card overflow-hidden mb-3">
            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=800&q=80" alt="Nutrition Basics">
              <div class="card-body">
                  <p><span class="badge badge-sm bg-blue-subtle text-blue-emphasis mb-1">Nutrition</span></p>
                  <h5>Module 1: Introduction to Healthy Nutrition</h5>
                  <p class="text-secondary small mb-2">Duration: 8 minutes | Level: Beginner</p>
                  <a href="https://www.youtube.com/watch?v=hNf1qzjYk0s" target="_blank" class="btn btn-link">Watch Video <i class="fa fa-arrow-right"></i></a>
              </div>
          </div>
      </div>

      <div class="col-12 col-md-6">
          <div class="card adminuiux-card module-card overflow-hidden mb-3">
            <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=800&q=80" alt="Human Anatomy">
              <div class="card-body">
                  <p><span class="badge badge-sm bg-yellow-subtle text-yellow-emphasis mb-1">Anatomy</span></p>
                  <h5>Module 2: Overview of Human Body Systems</h5>
                  <p class="text-secondary small mb-2">Duration: 12 minutes | Level: Intermediate</p>
                  <a href="https://www.youtube.com/watch?v=Q1c1Q1J1z1U" target="_blank" class="btn btn-link">Watch Video <i class="fa fa-arrow-right"></i></a>
              </div>
          </div>
      </div>

      <div class="col-12 col-md-6">
          <div class="card adminuiux-card module-card overflow-hidden mb-3">
              <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=800&q=80" alt="Diabetes Education">
              <div class="card-body">
                  <p><span class="badge badge-sm bg-green-subtle text-green-emphasis mb-1">Endocrinology</span></p>
                  <h5>Module 3: Understanding Diabetes & Insulin Function</h5>
                  <p class="text-secondary small mb-2">Duration: 10 minutes | Level: Beginner</p>
                  <a href="https://www.youtube.com/watch?v=L3vQJH4FvD0" target="_blank" class="btn btn-link">Watch Video <i class="fa fa-arrow-right"></i></a>
              </div>
          </div>
      </div>

      <div class="col-12 col-md-6">
          <div class="card adminuiux-card module-card overflow-hidden mb-3">
            <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=800&q=80" alt="Human Anatomy">
              <div class="card-body">
                  <p><span class="badge badge-sm bg-red-subtle text-red-emphasis mb-1">Emergency Care</span></p>
                  <h5>Module 4: Essential First Aid for Everyone</h5>
                  <p class="text-secondary small mb-2">Duration: 6 minutes | Level: Beginner</p>
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-link">Watch Video <i class="fa fa-arrow-right"></i></a>
              </div>
          </div>
      </div>
  </div>

<!-- Fun Health Facts Section -->
<div class="row gx-3 mt-4 mb-5">
  <div class="col-12">
      <div class="card adminuiux-card bg-theme-1-subtle p-4 text-center">
          <h5 class="fw-bold mb-3">Did You Know?</h5>
          <p class="small text-secondary mb-3">
              Regular physical activity can reduce the risk of chronic diseases, improve mental health, and boost overall energy levels. 
          </p>
      </div>
  </div>
</div>

@endsection
