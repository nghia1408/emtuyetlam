  <!-- làm tại đây -->

  


  <div class="app-content">
        <div class="app-content-header">
          <h1 class="app-content-headerText">Add Products</h1>
          <button class="mode-switch" title="Switch Theme">
            <svg
              class="moon"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>
        </div>
        <div class="app-content-actions">
          <input class="search-bar" placeholder="Search..." type="text" />
          <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper">
              <button class="action-button filter jsFilter">
                View
              </button>
            </div>
            <button class="action-button list active" title="List View">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-list"
              >
                <line x1="8" y1="6" x2="21" y2="6" />
                <line x1="8" y1="12" x2="21" y2="12" />
                <line x1="8" y1="18" x2="21" y2="18" />
                <line x1="3" y1="6" x2="3.01" y2="6" />
                <line x1="3" y1="12" x2="3.01" y2="12" />
                <line x1="3" y1="18" x2="3.01" y2="18" />
              </svg>
            </button>
            <button class="action-button grid" title="Grid View">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-grid"
              >
                <rect x="3" y="3" width="7" height="7" />
                <rect x="14" y="3" width="7" height="7" />
                <rect x="14" y="14" width="7" height="7" />
                <rect x="3" y="14" width="7" height="7" />
              </svg>
            </button>
          </div>
        </div>
          
          <div class="app-content">
            <div class="app-content-header">
              
              <button class="mode-switch" title="Switch Theme">
               
              </button>
            </div>
          
            <div class="add-product-form">
              <form>
                <div class="form-group">
                  <label for="productName" class="form-label">Tên sản phẩm</label>
                  <input type="text" id="productName" class="form-control" placeholder="Nhập tên sản phẩm" required>
                </div>
          
                <div class="form-group">
                  <label for="price" class="form-label">Giá ($)</label>
                  <input type="number" id="price" class="form-control" placeholder="Nhập giá" required>
                </div>
          
                <div class="form-group">
                  <label for="category" class="form-label">Danh mục</label>
                  <select id="category" class="form-control">
                    <option value="">Chọn danh mục</option>
                    <option value="furniture">Đồ nội thất</option>
                    <option value="decoration">Trang trí</option>
                    <option value="kitchen">Nhà bếp</option>
                    <option value="bathroom">Phòng tắm</option>
                  </select>
                </div>
          
                <div class="form-group">
                  <label for="description" class="form-label">Mô tả</label>
                  <textarea id="description" rows="4" class="form-control" placeholder="Nêu mô tả"></textarea>
                </div>
          
                <div class="form-group">
                  <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                  <input type="file" id="image" class="form-control">
                </div>
          
                <button type="submit" class="app-content-headerButton">Lưu sản phẩm</button>
              </form>
            </div>
          </div>