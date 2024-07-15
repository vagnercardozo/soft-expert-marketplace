PGDMP  ,    8    	            |            postgres    16.3 (Debian 16.3-1.pgdg120+1)    16.3 /    U           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            V           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            W           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            X           1262    5    postgres    DATABASE     s   CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';
    DROP DATABASE postgres;
                postgres    false            Y           0    0    DATABASE postgres    COMMENT     N   COMMENT ON DATABASE postgres IS 'default administrative connection database';
                   postgres    false    3416            �            1259    16389    product_categories    TABLE     $  CREATE TABLE public.product_categories (
    id integer NOT NULL,
    description character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp with time zone
);
 &   DROP TABLE public.product_categories;
       public         heap    postgres    false            �            1259    16388    product_categories_id_seq    SEQUENCE     �   CREATE SEQUENCE public.product_categories_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.product_categories_id_seq;
       public          postgres    false    216            Z           0    0    product_categories_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.product_categories_id_seq OWNED BY public.product_categories.id;
          public          postgres    false    215            �            1259    16467    product_categories_rates    TABLE     w   CREATE TABLE public.product_categories_rates (
    product_category_id bigint NOT NULL,
    rate_id bigint NOT NULL
);
 ,   DROP TABLE public.product_categories_rates;
       public         heap    postgres    false            �            1259    16398    products    TABLE     4  CREATE TABLE public.products (
    id integer NOT NULL,
    description character varying(255) NOT NULL,
    value numeric(10,2) NOT NULL,
    category_id bigint NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.products;
       public         heap    postgres    false            �            1259    16397    products_id_seq    SEQUENCE     �   CREATE SEQUENCE public.products_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public          postgres    false    218            [           0    0    products_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;
          public          postgres    false    217            �            1259    16435    products_sales    TABLE     e  CREATE TABLE public.products_sales (
    id integer NOT NULL,
    product_id bigint NOT NULL,
    sale_id bigint NOT NULL,
    value numeric(10,2) NOT NULL,
    quantity integer NOT NULL,
    rate numeric(10,2) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
 "   DROP TABLE public.products_sales;
       public         heap    postgres    false            �            1259    16434    products_sales_id_seq    SEQUENCE     �   CREATE SEQUENCE public.products_sales_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.products_sales_id_seq;
       public          postgres    false    222            \           0    0    products_sales_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.products_sales_id_seq OWNED BY public.products_sales.id;
          public          postgres    false    221            �            1259    16459    rates    TABLE       CREATE TABLE public.rates (
    id integer NOT NULL,
    description character varying(255) NOT NULL,
    value numeric(10,2) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.rates;
       public         heap    postgres    false            �            1259    16458    rates_id_seq    SEQUENCE     �   CREATE SEQUENCE public.rates_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.rates_id_seq;
       public          postgres    false    224            ]           0    0    rates_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.rates_id_seq OWNED BY public.rates.id;
          public          postgres    false    223            �            1259    16412    sales    TABLE     �   CREATE TABLE public.sales (
    id integer NOT NULL,
    value numeric(10,2) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.sales;
       public         heap    postgres    false            �            1259    16411    sales_id_seq    SEQUENCE     �   CREATE SEQUENCE public.sales_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.sales_id_seq;
       public          postgres    false    220            ^           0    0    sales_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.sales_id_seq OWNED BY public.sales.id;
          public          postgres    false    219            �           2604    16392    product_categories id    DEFAULT     ~   ALTER TABLE ONLY public.product_categories ALTER COLUMN id SET DEFAULT nextval('public.product_categories_id_seq'::regclass);
 D   ALTER TABLE public.product_categories ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216            �           2604    16401    products id    DEFAULT     j   ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            �           2604    16438    products_sales id    DEFAULT     v   ALTER TABLE ONLY public.products_sales ALTER COLUMN id SET DEFAULT nextval('public.products_sales_id_seq'::regclass);
 @   ALTER TABLE public.products_sales ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    221    222            �           2604    16462    rates id    DEFAULT     d   ALTER TABLE ONLY public.rates ALTER COLUMN id SET DEFAULT nextval('public.rates_id_seq'::regclass);
 7   ALTER TABLE public.rates ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    224    224            �           2604    16415    sales id    DEFAULT     d   ALTER TABLE ONLY public.sales ALTER COLUMN id SET DEFAULT nextval('public.sales_id_seq'::regclass);
 7   ALTER TABLE public.sales ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    220    220            I          0    16389    product_categories 
   TABLE DATA           a   COPY public.product_categories (id, description, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    216   [8       R          0    16467    product_categories_rates 
   TABLE DATA           P   COPY public.product_categories_rates (product_category_id, rate_id) FROM stdin;
    public          postgres    false    225   �8       K          0    16398    products 
   TABLE DATA           _   COPY public.products (id, description, value, category_id, created_at, updated_at) FROM stdin;
    public          postgres    false    218   �8       O          0    16435    products_sales 
   TABLE DATA           p   COPY public.products_sales (id, product_id, sale_id, value, quantity, rate, created_at, updated_at) FROM stdin;
    public          postgres    false    222   k9       Q          0    16459    rates 
   TABLE DATA           O   COPY public.rates (id, description, value, created_at, updated_at) FROM stdin;
    public          postgres    false    224   �9       M          0    16412    sales 
   TABLE DATA           B   COPY public.sales (id, value, created_at, updated_at) FROM stdin;
    public          postgres    false    220    :       _           0    0    product_categories_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.product_categories_id_seq', 46, true);
          public          postgres    false    215            `           0    0    products_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.products_id_seq', 26, true);
          public          postgres    false    217            a           0    0    products_sales_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.products_sales_id_seq', 47, true);
          public          postgres    false    221            b           0    0    rates_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.rates_id_seq', 48, true);
          public          postgres    false    223            c           0    0    sales_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.sales_id_seq', 44, true);
          public          postgres    false    219            �           2606    16396 *   product_categories product_categories_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.product_categories
    ADD CONSTRAINT product_categories_pkey PRIMARY KEY (id);
 T   ALTER TABLE ONLY public.product_categories DROP CONSTRAINT product_categories_pkey;
       public            postgres    false    216            �           2606    16405    products products_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public            postgres    false    218            �           2606    16442 "   products_sales products_sales_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.products_sales
    ADD CONSTRAINT products_sales_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.products_sales DROP CONSTRAINT products_sales_pkey;
       public            postgres    false    222            �           2606    16466    rates rates_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.rates
    ADD CONSTRAINT rates_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.rates DROP CONSTRAINT rates_pkey;
       public            postgres    false    224            �           2606    16419    sales sales_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.sales
    ADD CONSTRAINT sales_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.sales DROP CONSTRAINT sales_pkey;
       public            postgres    false    220            �           2606    16470 J   product_categories_rates product_categories_rates_product_category_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.product_categories_rates
    ADD CONSTRAINT product_categories_rates_product_category_id_fkey FOREIGN KEY (product_category_id) REFERENCES public.product_categories(id) ON DELETE CASCADE;
 t   ALTER TABLE ONLY public.product_categories_rates DROP CONSTRAINT product_categories_rates_product_category_id_fkey;
       public          postgres    false    216    3243    225            �           2606    16475 >   product_categories_rates product_categories_rates_rate_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.product_categories_rates
    ADD CONSTRAINT product_categories_rates_rate_id_fkey FOREIGN KEY (rate_id) REFERENCES public.rates(id) ON DELETE CASCADE;
 h   ALTER TABLE ONLY public.product_categories_rates DROP CONSTRAINT product_categories_rates_rate_id_fkey;
       public          postgres    false    3251    225    224            �           2606    16406 "   products products_category_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_category_id_fkey FOREIGN KEY (category_id) REFERENCES public.product_categories(id);
 L   ALTER TABLE ONLY public.products DROP CONSTRAINT products_category_id_fkey;
       public          postgres    false    216    3243    218            �           2606    16443 -   products_sales products_sales_product_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.products_sales
    ADD CONSTRAINT products_sales_product_id_fkey FOREIGN KEY (product_id) REFERENCES public.products(id);
 W   ALTER TABLE ONLY public.products_sales DROP CONSTRAINT products_sales_product_id_fkey;
       public          postgres    false    3245    218    222            �           2606    16453 +   products_sales products_sales_sales_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.products_sales
    ADD CONSTRAINT products_sales_sales_id_fkey FOREIGN KEY (sale_id) REFERENCES public.sales(id) ON DELETE CASCADE;
 U   ALTER TABLE ONLY public.products_sales DROP CONSTRAINT products_sales_sales_id_fkey;
       public          postgres    false    222    3247    220            I   E   x�31�tN,�K-�4202�50�54U04�24�26�60�%��eb�隗�X����M�%vݖP�1z\\\ �-'      R      x�31�41�21�4������� Dy      K   �   x�u�A
1�=�ػl�����7��/A�@`�?>ŏr5{k��j�p���\��3�kPy?���f��&5����)�R��[���aR�����d�7Yw�0i�y}UA�����bW�0]� ��6g      O   Q   x��̱�@C�ڙ��)6	'n��"j
��d�/�yO�@�~��Gc.��1u����E!�B�P���o�����$�      Q   D   x�31�I�HT04�44�30�4202�50�54U04�24�24��)�eb�n�i�]�%v� a�=... e�|      M   .   x�31�43�35�4202�50�54U04�2��2��6�%����� M4
�     