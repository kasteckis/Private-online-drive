import axios from 'axios';

export default {
  user: {
    login: (credentials) => axios
    .post('http://localhost:8080/react-app/backend/LoginHandler.php', { credentials })
    .then(res => res.data.username)
}
}
