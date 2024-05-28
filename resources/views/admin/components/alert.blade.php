<div class="toast show bg-black text-light fixed-bottom bottom-0 bottom-right" id="toast" aria-live="polite"
  aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{ $message }}
    </div>
    <button type="button" class="bg-transparent border-0 me-2 m-auto" data-bs-dismiss="toast" aria-label="Close">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="text-white">
        <path d="M5 5l7 7m7 7l-7-7m0 0l7-7m-7 7l-7 7" stroke="currentColor" stroke-linecap="round"></path>
      </svg>
    </button>
  </div>
</div>

<script>
  $(document).ready(function() {
    setTimeout(() => {
      $('#toast').fadeOut('slow');
    }, 5000);
  });
</script>
