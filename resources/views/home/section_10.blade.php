  <style>
      .org-chart {
          display: flex;
          flex-direction: column;
          align-items: center;
      }

      .org-level {
          display: flex;
          justify-content: center;
          margin-bottom: 20px;
          position: relative;
      }

      .org-box {
          border: 1px solid #dee2e6;
          padding: 20px;
          margin: 5px;
          border-radius: 5px;
          background-color: #f8f9fa;
          text-align: center;
          width: 200px;
      }

      .org-box img {
          width: 100px;
          height: 100px;
          object-fit: cover;
          border-radius: 50%;
          margin-bottom: 10px;
      }

      .org-connector-horizontal {
          position: absolute;
          top: 50%;
          left: 0;
          width: 100%;
          height: 2px;
          background-color: #dee2e6;
          z-index: -1;
      }

      .org-connector-vertical {
          position: absolute;
          top: -20px;
          left: 50%;
          width: 2px;
          height: 20px;
          background-color: #dee2e6;
          z-index: -1;
      }
  </style>
  <div class="container mt-5">
      <div class="org-chart">
          <div class="org-level">
              <div class="org-box">
                  <img src="https://via.placeholder.com/100" alt="CEO">
                  <h5>CEO</h5>
                  <p>Deskripsi singkat mengenai CEO.</p>
              </div>
          </div>
          <div class="org-connector-vertical"></div>
          <div class="org-level">
              <div class="org-connector-horizontal"></div>
              <div class="org-box">
                  <img src="https://via.placeholder.com/100" alt="COO">
                  <h5>COO</h5>
                  <p>Deskripsi singkat mengenai COO.</p>
              </div>
              <div class="org-box">
                  <img src="https://via.placeholder.com/100" alt="CFO">
                  <h5>CFO</h5>
                  <p>Deskripsi singkat mengenai CFO.</p>
              </div>
          </div>
          <div class="org-connector-vertical"></div>
          <div class="org-level">
              <div class="org-connector-horizontal"></div>
              <div class="org-box">
                  <img src="https://via.placeholder.com/100" alt="VP Teknologi">
                  <h5>VP Teknologi</h5>
                  <p>Deskripsi singkat mengenai VP Teknologi.</p>
              </div>
              <div class="org-box">
                  <img src="https://via.placeholder.com/100" alt="VP Pemasaran">
                  <h5>VP Pemasaran</h5>
                  <p>Deskripsi singkat mengenai VP Pemasaran.</p>
              </div>
              <div class="org-box">
                  <img src="https://via.placeholder.com/100" alt="VP SDM">
                  <h5>VP SDM</h5>
                  <p>Deskripsi singkat mengenai VP SDM.</p>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
