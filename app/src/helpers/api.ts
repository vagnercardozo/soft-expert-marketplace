import { api } from 'src/boot/axios';

type Input = { endpoint: string; data?: unknown };
const config = {
  headers: {
    Accept: 'application/json',
    ContentType: 'application/json',
  },
};
export class UseAPI {
  async get<T = unknown>({ endpoint }: Input): Promise<T> {
    const { data } = await api.get<T>(endpoint, config);
    return data;
  }

  async post<T = unknown>(p: Input): Promise<T> {
    const { data } = await api.post<T>(p.endpoint, p.data, config);
    return data;
  }

  async put<T = unknown>(p: Input) {
    const { data } = await api.put<T>(p.endpoint, p.data, config);
    return data;
  }

  async remove(p: Input) {
    const { status } = await api.delete(p.endpoint, config);
    return status;
  }
}
