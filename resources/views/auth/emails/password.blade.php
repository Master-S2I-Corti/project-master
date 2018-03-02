Click here to reset your password<br>
<a href="{{ $link = url('project-master/public/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>