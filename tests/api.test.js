const request = require('supertest');
const baseUrl = 'http://127.0.0.1:8000/api'; 

describe('User API Endpoints', () => {
    let userId = null;

    // Test GET /users (Mendapatkan daftar semua pengguna)
    test('should fetch all users', async () => {
        const res = await request(baseUrl).get('/users');
        expect(res.statusCode).toBe(200);
        expect(Array.isArray(res.body)).toBe(true);
    });

    // Test POST /users (Menambahkan pengguna baru)
    test('should create a new user', async () => {
        const res = await request(baseUrl)
            .post('/users')
            .send({
                name: 'John Doe',
                email: `johndoe${Date.now()}@example.com`,
                age: 25
            });
        
        expect(res.statusCode).toBe(201);
        expect(res.body).toHaveProperty('id');
        userId = res.body.id; // Simpan ID untuk tes berikutnya
    });

    // Test GET /users/:id (Mendapatkan data pengguna berdasarkan ID)
    test('should get a user by ID', async () => {
        const res = await request(baseUrl).get(`/users/${userId}`);
        expect(res.statusCode).toBe(200);
        expect(res.body).toHaveProperty('id', userId);
    });

    // Test PUT /users/:id (Memperbarui data pengguna)
    test('should update a user', async () => {
        const res = await request(baseUrl)
            .put(`/users/${userId}`)
            .send({ name: 'John Updated', age: 30 });

        expect(res.statusCode).toBe(200);
        expect(res.body).toHaveProperty('name', 'John Updated');
    });

    // Test DELETE /users/:id (Menghapus pengguna)
    test('should delete a user', async () => {
        const res = await request(baseUrl).delete(`/users/${userId}`);
        expect(res.statusCode).toBe(200);
    });
});
