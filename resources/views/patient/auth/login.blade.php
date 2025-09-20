@extends('patient.auth.layouts.main')
@section('custom-css')

@endsection
@section('content')
  <!-- Floating background shapes -->
  <div class="absolute top-14 left-10 w-24 h-24 rounded-full bg-emerald-200 opacity-30 float"></div>
  <div class="absolute bottom-20 right-14 w-32 h-32 rounded-full bg-green-300 opacity-30 float" style="animation-delay: 2s;"></div>

  <div class="w-full max-w-md fade-in-up">
    <!-- Card -->
    <div class="bg-white/90 backdrop-blur-md rounded-xl shadow-xl border border-emerald-100 p-6 sm:p-8">
      
      <!-- Icon -->
      <div class="flex justify-center mb-4">
        <div class="w-16 h-16 flex items-center justify-center bg-emerald-100 rounded-full shadow-sm">
          <img src="{{ asset('website-assets/images/logo/Shafayaat.png') }}" alt="Shafayaat Logo" class="w-12 h-12 object-contain rounded-full">
        </div>
      </div>

      <!-- Heading -->
      <h2 class="text-center text-2xl font-bold text-emerald-800 mb-1 uppercase">Shafayaat</h2>
      <p class="text-center text-emerald-600 text-sm mb-6">We’re here to care for you</p>

      <!-- Form -->
      <form action="{{route('patient.login')}}" method="POST" class="space-y-5">
        @csrf
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-emerald-700 mb-2">Email</label>
          <input type="email" id="email" name="email" required
            class="w-full px-4 py-3 rounded-md bg-white border border-emerald-200 text-emerald-900 placeholder-emerald-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none transition">
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-emerald-700 mb-2">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-3 rounded-md bg-white border border-emerald-200 text-emerald-900 placeholder-emerald-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none transition">
        </div>

        <!-- Forgot Password -->
        <div class="flex justify-end">
          <a href="#" class="text-sm text-emerald-700 hover:underline">Forgot password?</a>
        </div>

        <!-- Button -->
        <button type="submit" 
          class="w-full bg-gradient-to-r from-emerald-600 to-green-500 text-white py-3 rounded-md font-medium shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
          Sign In
        </button>
      </form>

      <!-- Divider -->
      <div class="flex items-center my-6">
        <div class="flex-grow h-px bg-emerald-200"></div>
        <span class="px-3 text-emerald-400 text-sm">or</span>
        <div class="flex-grow h-px bg-emerald-200"></div>
      </div>

      <!-- Sign Up -->
      <p class="text-center text-sm text-emerald-700">
        Don’t have an account? 
        <a href="#" class="text-green-600 hover:underline font-medium">Sign up</a>
      </p>
    </div>
  </div>

@endsection