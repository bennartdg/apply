<aside class="col-lg-2 col-4 vh-100 fixed-top bg-black d-flex">
  <div class="py-5 px-3 text-white d-flex flex-column justify-content-between">
    <div>
      <div>
        <img src="/asset/logo/APPLY-white.png" alt="" class="img-fluid">
        <p>
          <span class="text-dark-emphasis">for</span>
          <span>Admin</span>
        </p>
      </div>
      <div class="pt-5">
        <div class="d-flex flex-column gap-3">
          <div class="">
            <h5 class="">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
            <p class="text-dark-emphasis">{{ '@' . auth()->user()->username }}</p>
          </div>
        </div>
        <hr>
      </div>
    </div>

    <div class="d-flex">
      <div class="btn-group bg-black dropup">
        <a class="btn bg-black btn-black dropdown-toggle" href="#" data-bs-toggle="dropdown"
          aria-expanded="false">
          <img class="rounded-circle img-fluid"
            src="https://miro.medium.com/v2/resize:fill:100:100/1*dmbNkD5D-u45r44go_cf0g.png" width="36"
            height="36" loading="lazy">
        </a>
        <ul class="dropdown-menu bg-near-black mb-3">
          <li>
            <button type="button" class="btn btn-link link-light text-decoration-none d-flex align-items-center"
              data-bs-toggle="modal" data-bs-target="#logout_modal">
              <ion-icon name="log-out-outline"></ion-icon>
              <span class="ms-1">Logout</span>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</aside>

<div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header py-2 border-0 d-flex justify-content-end">
        <button type="button" class="btn btn-link text-dark" data-bs-dismiss="modal" aria-label="Close"><i
            class="fa-regular fa-x"></i></button>
      </div>
      <div class="modal-body">
        <div class="">
          <div class="mb-4">
            <h3 class="">Are you sure want to Logout?</h3>
            <p class="text-secondary">
              After you logged out, you need to re-login for apply.
            </p>
          </div>
          <form id="logout_form" action="/logout" method="POST">
            @csrf
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-outline-black px-5" data-bs-dismiss="modal"
                aria-label="Close">Cancel</button>
              <button type="submit" class="btn btn-dark ms-2 px-5">
                Logout
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
