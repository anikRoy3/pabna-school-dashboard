<style>
    .main-footer {
        background-color: #f8f9fa;
        padding: 10px 0;
        
    }

    .main-footer p {
        margin-bottom: 0;

    }

    .main-footer img {
        max-width: 100%;
        height: auto;   

    }
</style>


<footer class="main-footer" style="display: flex; justify-content: space-between; align-items: center; padding: 10px; position: fixed; bottom: 0; left: 0; right: 0; background-color: #f8f9fa;">

      <div>
          <strong>কপিরাইট &copy; {{ date("Y") }} সর্বস্বত্ব সংরক্ষিত <a href="https://land.gov.bd/"> ভূমি মন্ত্রণালয়,</a> গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</strong>
      </div>

      <a href="https://mysoftheaven.com/" style="margin-left: auto;">
          <img src="{{ asset('uploads/mysoft-logo.png') }}" alt="Your Logo" width="100" height="30">
      </a>
      <!-- jQuery CDN -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script>
        // Wait for the document to be ready
        $(document).ready(function () {
            console.log('fdafdasfdfasfds')
            // When a file is selected, update the label text with the file name
            $('#school_logo_input').change(function () {
                var fileName = $(this).val().split('\\').pop(); // Extract file name
                $(this).next('.custom-file-label').html(fileName); // Update label text
            });
        });
    </script>
</footer>
