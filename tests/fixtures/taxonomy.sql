DELETE FROM /*PREFIX*/wp_term_taxonomy;
DELETE FROM /*PREFIX*/wp_terms;
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES ( 1, 'cat 1',   'cat-1',   0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (11, 'cat 1.1', 'cat-1-1', 0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (12, 'cat 1.2', 'cat-1-2', 0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (13, 'cat 1.3', 'cat-1-3', 0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES ( 2, 'cat 2',   'cat-2',   0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (21, 'cat 2.1', 'cat-2-1', 0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (22, 'cat 2.2', 'cat-2-2', 0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (23, 'cat 2.3', 'cat-2-3', 0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES ( 3, 'cat 3',   'cat-3',   0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (31, 'cat 3.1', 'cat-3-1', 0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (32, 'cat 3.2', 'cat-3-2', 0);
INSERT INTO /*PREFIX*/wp_terms(term_id, name, slug, term_group) VALUES (33, 'cat 3.3', 'cat-3-3', 0);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES ( 1,  1, 'category', '', 0, 10);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (11, 11, 'category', '', 1, 11);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (12, 12, 'category', '', 1, 12);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (13, 13, 'category', '', 1,  0);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES ( 2,  2, 'category', '', 0, 20);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (21, 21, 'category', '', 2, 21);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (22, 22, 'category', '', 2, 22);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (23, 23, 'category', '', 2,  0);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES ( 3,  3, 'category', '', 0,  0);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (31, 31, 'category', '', 3, 31);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (32, 32, 'category', '', 3, 32);
INSERT INTO /*PREFIX*/wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES (33, 33, 'category', '', 3,  0);
