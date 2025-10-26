@extends('patient.layouts.main')

@section('custom-css')
<style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #f9faf9;
    color: #1e293b;
  }

  .breadcrumb-bar {
    background: #ffffff;
    border-radius: 14px;
    padding: 1rem 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.04);
  }

  .breadcrumb {
    margin-bottom: 0;
  }

  .page-title {
    font-weight: 700;
    color: #14532d;
    margin-bottom: 0.25rem;
    font-size: 1.6rem;
  }

  .subtitle {
    color: #64748b;
    font-size: 0.95rem;
    margin-bottom: 2rem;
    font-style: italic;
  }

  .goals-container {
    background: #ffffff;
    border-radius: 20px;
    padding: 2.2rem;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
  }

  .goal-input {
    width: 100%;
    border: 1px solid #dce2de;
    border-radius: 10px;
    padding: 1rem 1.25rem;
    font-size: 1rem;
    font-family: 'Inter', sans-serif;
    line-height: 1.6;
    color: #334155;
    resize: none;
    background: #f9fbfa;
    transition: all 0.3s ease;
  }

  .goal-input:focus {
    border-color: #16a34a;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
    outline: none;
  }

  .add-btn {
    background-color: #14532d;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 0.75rem 1.6rem;
    font-size: 0.95rem;
    font-weight: 500;
    letter-spacing: 0.3px;
    transition: background 0.3s ease, transform 0.1s ease;
  }

  .add-btn:hover {
    background-color: #166534;
    transform: translateY(-1px);
  }

  .goals-list {
    margin-top: 2rem;
    border-top: 1px solid #e2e8f0;
    padding-top: 1.5rem;
  }

  .goal-item {
    background: #f9faf9;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 1rem;
    transition: all 0.25s ease;
  }

  .goal-item:hover {
    background: #f1f5f3;
    border-color: #d1e1d8;
  }

  .goal-text {
    font-size: 1rem;
    color: #1e293b;
    font-family: 'Inter', sans-serif;
  }

  .goal-meta {
    color: #64748b;
    font-size: 0.85rem;
    margin-top: 0.3rem;
    font-style: italic;
  }

  .goal-actions {
    margin-top: 0.8rem;
  }

  .goal-actions button {
    border: none;
    background: none;
    color: #14532d;
    font-size: 0.9rem;
    cursor: pointer;
    margin-right: 0.75rem;
    transition: color 0.2s ease;
  }

  .goal-actions button:hover {
    color: #22c55e;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .goals-container {
      padding: 1.5rem;
    }

    .goal-input {
      padding: 0.8rem 1rem;
      font-size: 0.95rem;
    }

    .add-btn {
      width: 100%;
      margin-top: 0.5rem;
    }
  }
  .breadcrumb-item+.breadcrumb-item:before {
      content: '' !important;
    }
</style>
@endsection

@section('content')
<div class="container py-4">

  <!-- Breadcrumb -->
  <div class="bg-light rounded px-3 py-2 mb-3 shadow-sm">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{route('patient-dashboard')}}">Dashboard</a> <i class="fa fa-angle-right"></i> </li>
            <li class="breadcrumb-item active">Personal Goals</li>
        </ol>
    </nav>
</div>

  <!-- Goals Section -->
  <div class="goals-container">
    <p class="subtitle">“Small disciplines repeated with consistency every day lead to great achievements gained slowly over time.”</p>

    <!-- Add Goal Input -->
    <div class="mb-3">
      <textarea id="goalInput" class="goal-input" rows="2" placeholder="Write your new goal or reflection here..."></textarea>
      <div class="text-end mt-2">
        <button id="addGoal" class="add-btn">Add Goal</button>
      </div>
    </div>

    <!-- Goals List -->
    <div id="goalsList" class="goals-list"></div>
  </div>
</div>
@endsection

@section('custom-js')
<script>
  const addBtn = document.getElementById('addGoal');
  const input = document.getElementById('goalInput');
  const list = document.getElementById('goalsList');

  // Sample Goals
  let goals = [
    { text: "Maintain a calm mindset regardless of stress levels", date: "Oct 10, 2025" },
    { text: "Wake up at 6 AM and meditate for 10 minutes daily", date: "Oct 15, 2025" },
    { text: "Read one page of a self-growth book each night", date: "Oct 18, 2025" }
  ];

  function renderGoals() {
    list.innerHTML = '';
    goals.forEach((goal, index) => {
      const div = document.createElement('div');
      div.classList.add('goal-item');
      div.innerHTML = `
        <p class="goal-text">${goal.text}</p>
        <p class="goal-meta">Added on ${goal.date}</p>
        <div class="goal-actions">
          <button onclick="editGoal(${index})">Edit</button>
          <button onclick="deleteGoal(${index})">Delete</button>
        </div>
      `;
      list.appendChild(div);
    });
  }

  addBtn.addEventListener('click', () => {
    const text = input.value.trim();
    if (text) {
      const today = new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
      goals.push({ text, date: today });
      input.value = '';
      renderGoals();
    }
  });

  window.deleteGoal = (index) => {
    goals.splice(index, 1);
    renderGoals();
  };

  window.editGoal = (index) => {
    const newText = prompt("Edit your goal:", goals[index].text);
    if (newText && newText.trim() !== '') {
      goals[index].text = newText.trim();
      renderGoals();
    }
  };

  renderGoals();
</script>
@endsection
