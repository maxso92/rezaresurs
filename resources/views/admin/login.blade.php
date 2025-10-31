@extends('admin.layouts.guest')

@section('title', 'Вход в админ-панель')

@section('content')
<div class="d-flex flex-column flex-root">
    <!--Page-->
    <div class="page d-flex flex-row flex-column-fluid">

        <!--///////////Page content wrapper///////////////-->
        <main class="page-content overflow-hidden ms-0 d-flex flex-column flex-row-fluid">

            <!--//content//-->
            <div class="content p-1 d-flex flex-column-fluid position-relative">
                <div class="container py-4">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-8 col-lg-5 col-xl-4">
                            <!--Logo-->

                            <!--Card-->
                            <div class="card card-body p-4">
                                <h4 class="text-center">Добро пожаловать!</h4>
                                <p class="mb-4 text-body-secondary text-center">
                                    Войдите в систему
                                </p>

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('admin.login.submit') }}" class="z-1 position-relative needs-validation" novalidate>
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               required
                                               id="floatingInput"
                                               name="email"
                                               value="{{ old('email') }}"
                                               placeholder="name@example.com">
                                        <label for="floatingInput">Email адрес</label>
                                        <span class="invalid-feedback">Пожалуйста, введите корректный email</span>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password"
                                               required
                                               class="form-control @error('password') is-invalid @enderror"
                                               id="floatingPassword"
                                               name="password"
                                               placeholder="Пароль">
                                        <label for="floatingPassword">Пароль</label>
                                        <span class="invalid-feedback">Введите пароль</span>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input me-1" id="remember" type="checkbox" name="remember" value="1">
                                            <label class="form-check-label" for="remember">Запомнить меня</label>
                                        </div>
                                    </div>

                                    <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--///////////Page content wrapper end///////////////-->

             <!--//Page-footer//-->
             <footer class="pb-3 pb-lg-5 px-3 px-lg-6">
                <div class="container-fluid px-0">
                  <span class="d-block lh-sm small text-body-secondary text-end">&copy;
                    <script>document.write(new Date().getFullYear())</script>. Резаресурс
                  </span>
                </div>
              </footer>
              <!--/.Page Footer End-->
        </main>
    </div>
</div>
@endsection
