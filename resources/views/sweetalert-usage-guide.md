# SweetAlert2 Usage Guide for Hospital Management System

## Overview
This guide explains how to use SweetAlert2 throughout the hospital management system for consistent and beautiful user notifications.

## Global Helper Functions

The following functions are available globally across all layouts:

### Success Notifications
```javascript
// Toast notification (auto-dismisses)
showSuccess('User created successfully!');

// Modal notification with custom title
showSuccess('User created successfully!', 'Great!');

// Using showToast for more control
showToast('Operation completed', 'success');
```

### Error Notifications
```javascript
// Error modal
showError('Failed to create user');

// Error modal with custom title
showError('Failed to create user', 'Oops!');
```

### Warning Notifications
```javascript
// Warning modal
showWarning('This action cannot be undone');

// Warning modal with custom title
showWarning('This action cannot be undone', 'Please Confirm');
```

### Info Notifications
```javascript
// Info modal
showInfo('System will be under maintenance');

// Info modal with custom title
showInfo('System will be under maintenance', 'Maintenance Notice');
```

### Loading States
```javascript
// Show loading
showLoading('Creating user...');

// Hide loading
hideLoading();
```

### Confirmation Dialogs
```javascript
// Simple confirmation
confirmDelete('Are you sure you want to delete this user?')
    .then((result) => {
        if (result.isConfirmed) {
            // Proceed with deletion
        }
    });

// Custom confirmation
Swal.fire({
    title: 'Custom Confirmation',
    text: 'Do you want to proceed?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes, proceed!',
    cancelButtonText: 'Cancel'
}).then((result) => {
    if (result.isConfirmed) {
        // Handle confirmation
    }
});
```

## Controller Response Patterns

### JSON Responses (for AJAX)
```php
// Success response
return response()->json([
    'success' => true,
    'message' => 'User created successfully!'
]);

// Error response
return response()->json([
    'success' => false,
    'message' => 'Failed to create user'
]);
```

### Redirect with Flash Messages
```php
// Success redirect
return redirect()->back()->with('success', 'User created successfully!');

// Error redirect
return redirect()->back()->with('error', 'Failed to create user');
```

## Frontend AJAX Handling

### Basic AJAX with SweetAlert
```javascript
$.ajax({
    url: '/admin/users',
    type: 'POST',
    data: formData,
    success: function(response) {
        if (response.success) {
            showSuccess(response.message);
            // Additional success handling
        } else {
            showError(response.message);
        }
    },
    error: function(xhr) {
        if (xhr.responseJSON && xhr.responseJSON.message) {
            showError(xhr.responseJSON.message);
        } else {
            showError('An unexpected error occurred');
        }
    }
});
```

### Form Submission with Loading States
```javascript
$('#userForm').on('submit', function(e) {
    e.preventDefault();
    
    const button = $(this).find('button[type="submit"]');
    const originalText = setButtonLoading(button, 'Creating...');
    
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            resetButton(button, originalText);
            if (response.success) {
                showSuccess(response.message);
                $('#userModal').modal('hide');
                location.reload(); // or update table
            } else {
                showError(response.message);
            }
        },
        error: function(xhr) {
            resetButton(button, originalText);
            showError('An error occurred while processing your request');
        }
    });
});
```

## Toast Notifications

Toast notifications are perfect for non-critical messages:

```javascript
// Success toast
showToast('Settings saved', 'success');

// Error toast
showToast('Failed to save', 'error');

// Warning toast
showToast('Please check your input', 'warning');

// Info toast
showToast('New update available', 'info');
```

## Custom SweetAlert Configurations

### Custom Styling
```javascript
Swal.fire({
    title: 'Custom Styled Alert',
    text: 'This alert has custom styling',
    icon: 'success',
    confirmButtonColor: '#067a63', // Hospital theme color
    background: '#f8f9fa',
    customClass: {
        popup: 'custom-popup-class'
    }
});
```

### Input Forms
```javascript
Swal.fire({
    title: 'Enter User Name',
    input: 'text',
    inputPlaceholder: 'Enter name here',
    showCancelButton: true,
    confirmButtonText: 'Create',
    cancelButtonText: 'Cancel'
}).then((result) => {
    if (result.isConfirmed) {
        // Handle input
        console.log('User entered:', result.value);
    }
});
```

### Progress Bars
```javascript
Swal.fire({
    title: 'Processing...',
    html: 'Please wait while we process your request',
    allowOutsideClick: false,
    allowEscapeKey: false,
    showConfirmButton: false,
    didOpen: () => {
        Swal.showLoading();
    }
});
```

## Best Practices

1. **Use appropriate notification types:**
   - `showSuccess()` for successful operations
   - `showError()` for errors that need user attention
   - `showToast()` for non-critical notifications
   - `showWarning()` for important warnings

2. **Provide clear, actionable messages:**
   - Good: "User created successfully!"
   - Bad: "Success"

3. **Use loading states for long operations:**
   ```javascript
   showLoading('Processing your request...');
   // Perform operation
   hideLoading();
   ```

4. **Handle both success and error cases:**
   ```javascript
   if (response.success) {
       showSuccess(response.message);
   } else {
       showError(response.message);
   }
   ```

5. **Use confirmations for destructive actions:**
   ```javascript
   confirmDelete('Are you sure you want to delete this user?')
       .then((result) => {
           if (result.isConfirmed) {
               // Proceed with deletion
           }
       });
   ```

## Integration with Existing Code

The system is already set up to work with SweetAlert. Simply replace any existing `alert()` calls with the appropriate SweetAlert function:

```javascript
// Old way
alert('User created successfully!');

// New way
showSuccess('User created successfully!');
```

All layouts (admin, user, website) now include the global helper functions, so you can use them anywhere in your JavaScript code.
