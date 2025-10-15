@extends('patient.layouts.main')

@section('custom-css')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

  body {
    font-family: 'Inter', sans-serif;
    background-color: #f8faf9;
    color: #333;
  }

  .page-header {
    text-align: center;
    margin-bottom: 2rem;
  }

  .page-header h3 {
    color: #2f5e4d;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }

  .page-header p {
    color: #6a7b72;
    font-size: 0.95rem;
  }

  .card {
    background-color: #fff;
    border: 1px solid #e2e7e4;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    transition: all 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
  }

  .card-header {
    background-color: transparent;
    border-bottom: 1px solid #eef1ef;
    font-weight: 600;
    color: #2f5e4d;
    font-size: 1.05rem;
  }

  .module-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  .module-card {
    background: #fff;
    border: 1px solid #e1e8e3;
    border-radius: 10px;
    padding: 1.5rem;
    box-shadow: 0 3px 8px rgba(0,0,0,0.04);
    transition: all 0.3s;
  }

  .module-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.08);
  }

  .module-card h5 {
    color: #2f5e4d;
    font-weight: 600;
    margin-bottom: 0.6rem;
  }

  .module-card p {
    color: #5f6f68;
    font-size: 0.9rem;
    margin-bottom: 1rem;
  }

  .btn-read {
    background-color: #2f5e4d;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 6px 12px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
  }

  .btn-read:hover {
    background-color: #3a6f59;
  }

  .video-section {
    margin-top: 2rem;
  }

  .video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
  }

  .video-card {
    border: 1px solid #e2e7e4;
    border-radius: 10px;
    background: #fff;
    overflow: hidden;
    box-shadow: 0 3px 8px rgba(0,0,0,0.04);
    transition: all 0.3s;
  }

  .video-card:hover {
    box-shadow: 0 6px 14px rgba(0,0,0,0.08);
  }

  .video-card iframe {
    width: 100%;
    height: 200px;
    border: none;
  }

  .video-card .video-info {
    padding: 0.75rem 1rem;
  }

  .video-card h6 {
    color: #2f5e4d;
    font-weight: 600;
    margin-bottom: 0.4rem;
  }

  .video-card p {
    color: #607369;
    font-size: 0.85rem;
  }

  .info-box {
    background-color: #f2f6f4;
    border-left: 4px solid #2f5e4d;
    padding: 15px 20px;
    border-radius: 8px;
    color: #40594c;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
  }
</style>
@endsection

@section('content')
<main class="container py-4 flex-grow-1">
  <div class="page-header">
    <h3>Patient E-Learning Center</h3>
    <p>Enhance your understanding of health and wellness through guided modules, articles, and trusted educational videos.</p>
  </div>

  <div class="info-box">
    <strong>Tip:</strong> Learning about your condition helps you make informed health decisions and improves adherence to treatment.
  </div>

  <!-- Educational Modules -->
  <div class="card mb-4">
    <div class="card-header">Health Education Modules</div>
    <div class="card-body">
      <div class="module-list">
        <div class="module-card">
          <h5>Managing Blood Pressure</h5>
          <p>Understand what causes high blood pressure and how lifestyle changes can help you maintain a healthy range.</p>
          <button class="btn-read">Read Module</button>
        </div>

        <div class="module-card">
          <h5>Nutrition and Healthy Eating</h5>
          <p>Learn how to create a balanced diet plan that supports heart health and improves energy levels.</p>
          <button class="btn-read">Read Module</button>
        </div>

        <div class="module-card">
          <h5>Understanding Diabetes</h5>
          <p>Explore what diabetes is, the types, and how you can effectively monitor and manage your condition.</p>
          <button class="btn-read">Read Module</button>
        </div>

        <div class="module-card">
          <h5>Importance of Regular Exercise</h5>
          <p>Find out how daily physical activity can enhance both your mental and physical well-being.</p>
          <button class="btn-read">Read Module</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Video Learning -->
  <div class="card video-section">
    <div class="card-header">Video Learning Library</div>
    <div class="card-body">
      <div class="video-grid">
        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/7XqT4JBl4v8" allowfullscreen></iframe>
          <div class="video-info">
            <h6>How to Eat Healthy Every Day</h6>
            <p>Practical tips for maintaining a balanced diet and portion control.</p>
          </div>
        </div>

        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/1Jq7xUoOjb8" allowfullscreen></iframe>
          <div class="video-info">
            <h6>Simple Home Workouts for Beginners</h6>
            <p>Gentle routines you can do daily to improve fitness and posture.</p>
          </div>
        </div>

        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/QEwKCR5JCog" allowfullscreen></iframe>
          <div class="video-info">
            <h6>Understanding Stress and Sleep</h6>
            <p>Learn about the link between quality sleep, stress, and your immune health.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
