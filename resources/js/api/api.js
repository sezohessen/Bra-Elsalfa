const API_BASE_URL = 'http://localhost:8000/api';

const apiRequest = async (method, url, data) => {
  const response = await fetch(`${API_BASE_URL}/${url}`, {
    method,
    headers: {
      'Content-Type': 'application/json',
    },
    body: data ? JSON.stringify(data) : null,
  });

  if (!response.ok) {
    const errorData = await response.json();
    throw new Error(errorData.message || 'Something went wrong');
  }

  const responseData = await response.json();
  return responseData;
};

export const get = async (url) => apiRequest('GET', url);

export const post = async (url, data) => apiRequest('POST', url, data);

export const put = async (url, data) => apiRequest('PUT', url, data);

export const remove = async (url) => apiRequest('DELETE', url);
