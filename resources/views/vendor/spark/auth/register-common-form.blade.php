<form class="form-horizontal" role="form">
    <!-- Team Name -->
    @if (Spark::usesTeams())
        <div class="form-group" :class="{'has-error': registerForm.errors.has('team')}" v-if=" ! invitation">
            <label class="col-md-4 control-label">Team Name</label>

            <div class="col-md-6">
                <input type="name" class="form-control" name="team" v-model="registerForm.team" autofocus>

                <span class="help-block" v-show="registerForm.errors.has('team')">
                    @{{ registerForm.errors.get('team') }}
                </span>
            </div>
        </div>
    @endif

    <!-- First Name -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('first_name')}">
        <label class="col-md-4 control-label">First Name</label>

        <div class="col-md-6">
            <input type="name" class="form-control" name="first_name" v-model="registerForm.first_name" autofocus>

            <span class="help-block" v-show="registerForm.errors.has('first_name')">
                @{{ registerForm.errors.get('first_name') }}
            </span>
        </div>
    </div>

    <!-- Last Name -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('last_name')}">
        <label class="col-md-4 control-label">Last Name</label>

        <div class="col-md-6">
            <input type="name" class="form-control" name="last_name" v-model="registerForm.last_name" autofocus>

            <span class="help-block" v-show="registerForm.errors.has('last_name')">
                @{{ registerForm.errors.get('last_name') }}
            </span>
        </div>
    </div>

    <!-- E-Mail Address -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('email')}">
        <label class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input type="email" class="form-control" name="email" v-model="registerForm.email">

            <span class="help-block" v-show="registerForm.errors.has('email')">
                @{{ registerForm.errors.get('email') }}
            </span>
        </div>
    </div>

    <!-- Password -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password')}">
        <label class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password" v-model="registerForm.password">

            <span class="help-block" v-show="registerForm.errors.has('password')">
                @{{ registerForm.errors.get('password') }}
            </span>
        </div>
    </div>

    <!-- Password Confirmation -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password_confirmation')}">
        <label class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation" v-model="registerForm.password_confirmation">

            <span class="help-block" v-show="registerForm.errors.has('password_confirmation')">
                @{{ registerForm.errors.get('password_confirmation') }}
            </span>
        </div>
    </div>

    <!-- Terms And Conditions -->
    <div v-if=" ! selectedPlan || selectedPlan.price == 0">
        <div class="form-group" :class="{'has-error': registerForm.errors.has('terms')}">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms" v-model="registerForm.terms">
                        I Accept The <a href="/terms" target="_blank">Terms Of Service</a>
                    </label>

                    <span class="help-block" v-show="registerForm.errors.has('terms')">
                        @{{ registerForm.errors.get('terms') }}
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button class="btn btn-primary" @click.prevent="register" :disabled="registerForm.busy">
                    <span v-if="registerForm.busy">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>Registering
                    </span>

                    <span v-else>
                        <i class="fa fa-btn fa-check-circle"></i>Register
                    </span>
                </button>
            </div>
        </div>
    </div>
</form>
