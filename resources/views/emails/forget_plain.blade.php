
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <table border="0" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-collapse: collapse;">
      <tr>
        <td style="padding: 20px;">
          <!-- Logo -->
          <img src="https://static.vecteezy.com/system/resources/previews/023/179/015/original/cpa-letter-logo-design-in-illustration-logo-calligraphy-designs-for-logo-poster-invitation-etc-vector.jpg" alt="Logo" style="max-width: 100px; height: 100px;">
          <h1 style="color: #333333;">{{$title}}</h1>
          <p style="color: #666666;">Your target code is:<b>{{$forgetCode}}</b>. </p>
          <p style="color: #666666;">Do not Share your secret code.</p>

          @if ($btn)
          <a href="#" style="display: inline-block; padding: 10px 20px; background-color: #3498db; color: #ffffff; text-decoration: none;">Read More</a>  
          @endif
          
        </td>
      </tr>
      <tr>
        <td style="background-color: #f4f4f4; padding: 20px;">
          <h2 style="color: #333333;">Featured Article</h2>
          <p style="color: #666666;">Check out our latest article on a fascinating topic!</p>
          <a href="#" style="color: #3498db; text-decoration: none;">Read the Article</a>
        </td>
      </tr>
      <tr>
        <td style="text-align: center; padding: 20px;">
          <p style="color: #999999;">You are receiving this email because you subscribed to our newsletter. To unsubscribe, <a href="#" style="color: #3498db; text-decoration: none;">click here</a>.</p>
        </td>
      </tr>
    </table>
  </body>

</html>