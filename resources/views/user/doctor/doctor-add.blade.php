@extends('user.layouts.main')   
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/form-file-uploader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/form-file-uploader.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css-rtl/plugins/forms/form-file-uploader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css-rtl/plugins/forms/form-file-uploader.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
@endsection
@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-md-7 col-12">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Patient Information</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="fname-icon">Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" id="fname-icon" class="form-control" value="{{ $patient->name }}" placeholder="First Name" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="email-icon">Email</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="mail"></i></span>
                                                    </div>
                                                    <input type="email" id="email-icon" class="form-control" value="{{ $patient->email }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="contact-icon">CNIC</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="battery"></i></span>
                                                    </div>
                                                    <input type="text" id="contact-icon" class="form-control" value="{{ $patient->cnic }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="pass-icon">Unique Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="command"></i></span>
                                                    </div>
                                                    <input type="text" id="pass-icon" class="form-control" value="{{ $patient->unique_number }}" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="fname-icon">Weight</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" id="fname-icon" class="form-control" value="{{ $medicalRecord->weight }}" placeholder="First Name" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="email-icon">Height</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="mail"></i></span>
                                                    </div>
                                                    <input type="text" id="email-icon" class="form-control" value="{{ $medicalRecord->height }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="contact-icon">Systolic Blood Pressure</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="battery"></i></span>
                                                    </div>
                                                    <input type="text" id="contact-icon" class="form-control" value="{{ $medicalRecord->systolic_blood_pressure }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="contact-icon">Diastolic Blood Pressure</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="battery"></i></span>
                                                    </div>
                                                    <input type="text" id="contact-icon" class="form-control" value="{{ $medicalRecord->diasystolic_blood_pressure }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="pass-icon">Temperature</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="command"></i></span>
                                                    </div>
                                                    <input type="text" id="pass-icon" class="form-control" value="{{ $medicalRecord->temperature }}" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="pass-icon">Weather</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="command"></i></span>
                                                    </div>
                                                    <input type="text" id="pass-icon" class="form-control" value="{{ $medicalRecord->weather }}" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Fill the form</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('save-doctor-reports') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="complaint">Present Complaint</label>
                                            <textarea class="form-control" id="complaint" rows="3" name="complaint" placeholder="Present Complaint"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="symptoms">Symptoms</label>
                                            <textarea class="form-control" id="symptoms" rows="3" name="symptoms" placeholder="Symptoms"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="blood_pressure">Blood Pressure</label>
                                            <textarea class="form-control" id="blood_pressure" rows="1" name="blood_pressure" placeholder="Blood Pressure"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="diagnosis">Provisional Diagnosis</label>
                                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                            <textarea class="form-control" id="diagnosis" rows="3" name="final_diagnosis" placeholder="Provisional Diagnosis"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="medication">Prescription</label>
                                            <textarea class="form-control" id="medication" rows="3" name="recommended_medication" placeholder="Prescription"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="investigation">Lab Investigation</label>
                                            <textarea class="form-control" id="investigation" rows="3" name="further_investigation" placeholder="Lab Investigation"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-12 col-form-label">
                                                <label for="reports">Reports</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="file" id="reports" class="form-control" name="reports" placeholder="Reports File" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                    @if($patient->answers->isNotEmpty())
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Patient Data</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="row">
                                    
                                    @foreach ($patient->answers as $answer)
                                        
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-form-label">
                                                <label for="fname-icon">{{ $answer->question }}</label>
                                            </div>
                                            <div class="col-sm-12   ">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" id="fname-icon" class="form-control" value="{{ $answer->answer }}" placeholder="Answer" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                <div class="container">
                    <header class="header">
                        <div class="header-title">
                            <h1>AI Assistant</h1>
                            <div class="bot-status">
                                <div class="status-indicator"></div>
                                <span>Online</span>
                            </div>
                        </div>
                        <div class="controls">
                            <button class="theme-toggle" aria-label="Toggle theme">
                                <i class="fas fa-moon"></i>
                            </button>
                        </div>
                    </header>

                    <div class="chat-container" id="chatContainer">
                        <!-- Messages will be added here -->
                    </div>

                    <div class="typing-indicator">
                        <div class="typing-dots">
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                        </div>
                    </div>

                    <div class="input-container">
                        <div class="input-wrapper">
                            <input type="text" class="message-input" placeholder="Type your message..." aria-label="Message input">
                            <div class="action-buttons">
                                <button class="action-button" aria-label="Add attachment">
                                    <i class="fas fa-paperclip"></i>
                                </button>
                                <button class="action-button" aria-label="Voice input">
                                    <i class="fas fa-microphone"></i>
                                </button>
                                <button class="send-button">
                                    <span>Send</span>
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    @endsection
@section('custom-js')
    <script src="{{ asset('admin-assets/vendors/js/file-uploaders/dropzone.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/forms/form-file-uploader.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/forms/form-file-uploader.min.js') }}"></script>
 <script>
    const themeToggle = document.querySelector('.theme-toggle');
        const body = document.body;
        const chatContainer = document.getElementById('chatContainer');
        const messageInput = document.querySelector('.message-input');
        const sendButton = document.querySelector('.send-button');
        const typingIndicator = document.querySelector('.typing-indicator');

        // Theme toggling
        let isDarkTheme = false;
        themeToggle.addEventListener('click', () => {
            isDarkTheme = !isDarkTheme;
            body.setAttribute('data-theme', isDarkTheme ? 'dark' : 'light');
            themeToggle.innerHTML = isDarkTheme ? 
                '<i class="fas fa-sun"></i>' : 
                '<i class="fas fa-moon"></i>';
        });

        // Chat functionality
        function createMessageElement(content, isUser = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
            
            messageDiv.innerHTML = `
                <div class="avatar">${isUser ? 'U' : 'AI'}</div>
                <div class="message-bubble">${content}</div>
            `;
            
            return messageDiv;
        }

        function addMessage(content, isUser = false) {
            const messageElement = createMessageElement(content, isUser);
            chatContainer.appendChild(messageElement);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        function showTypingIndicator() {
            typingIndicator.style.display = 'block';
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        function hideTypingIndicator() {
            typingIndicator.style.display = 'none';
        }

        function simulateBotResponse(userMessage) {
            showTypingIndicator();
            
            // Simulate varying response times
            setTimeout(() => {
                hideTypingIndicator();
                const responses = [
                    "I understand you're asking about " + userMessage + ". Could you elaborate?",
                    "That's an interesting point about " + userMessage + ". Let me help you with that.",
                    "I've analyzed your message about " + userMessage + ". Here's what I think..."
                ];
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                addMessage(randomResponse);
            }, Math.random() * 1000 + 1500);
        }

        function handleSendMessage() {
            const message = messageInput.value.trim();
            if (message) {
                addMessage(message, true);
                messageInput.value = '';
                simulateBotResponse(message);
            }
        }

        sendButton.addEventListener('click', handleSendMessage);
        messageInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                handleSendMessage();
            }
        });

        setTimeout(() => {
            addMessage("Hello! I'm your AI assistant. How can I help you today?");
        }, 500);
 </script>
@endsection