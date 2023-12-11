type CabbageType = 'red' | 'green' | 'white' | 'savoy' | 'napa';

interface Timestamps {
  created_at: Date,
  updated_at: Date
}

export interface User extends Timestamps {
  id: string;
  name: string;
  email: string;
  email_verified_at: string;
}

export interface CabbageUser extends Timestamps {
  amount: number,
  user: User,
}

export interface Cabbage extends Timestamps {
  id: number;
  amount: number;
  type: CabbageType;
  cabbageUsers: CabbageUser[];
}

export interface DropdownOption {
  label: string;
  value: string | number | undefined;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User;
  };
};
